<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;

class TheatreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Theatre::all();
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
                'cinema_id' => 'required|min:3|max:50',
                'type_id' => 'required|numeric',
                'theatre_number' => 'required|min:3'
            ]);

            Theatre::create($new);

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

            $var = Theatre::findOrFail($id);

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
    public function update(Request $request, $id)
    {
        try {
            $var = Theatre::findOrFail($id);

            if($request->cinema_id == NULL){
                $request->cinema_id = $var->cinema_id;
            }
            if($request->type_id == NULL){
                $request->type_id = $var->type_id;
            }
            if($request->theatre_number == NULL){
                $request->theatre_number = $var->theatre_number;
            }

            $var->update([
                'cinema_id' => $request->cinema_id,
                'type_id' => $request->type_id,
                'theatre_number' => $request->theatre_number
            ]);

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
            $var = Theatre::findOrFail($id);
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
