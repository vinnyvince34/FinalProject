<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $new = $this->validate($request, [
                'type_name' => 'required|min:3|max:50', //type:: 2D, 3D, IMAX, velvet
                'weekday_price' => 'required|digits_between:4,5|numeric',
                'weekend_price' => 'required|digits_between:4,5|numeric'
            ]);

            RoomType::create($new);

            return response(["Successful!"]);

        } catch(\Exception $e){

            return response([
                $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{

            $var = RoomType::findOrFail($id);

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Movie not found.", 400);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $var = RoomType::findOrFail($request->id);

            if($request->type_name == NULL){
                $request->type_name = $var->type_name;
            }
            if($request->weekday_price == NULL){
                $request->weekday_price = $var->weekday_price;
            }
            if($request->weekend_price == NULL){
                $request->weekend_price = $var->weekend_price;
            }

            $var->update([
                'type_name' => $request->type_name,
                'weekday_price' => $request->weekday_price,
                'weekend_price' => $request->weekend_price
            ]);

            $var->save();

        } catch (\Exception $e) {

            return response([
                $e
            ], 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $var = RoomType::findOrFail($id);
            if(isset($var)){
                $var -> delete();
                return response(
                    "Successful",200
                );
            }
        }catch(\Exception $e){
            return response(
                $e->getMessage(), 400
            );
        }
    }
}
