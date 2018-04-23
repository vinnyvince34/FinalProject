<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Promo::all();
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
                'name' => 'required|min:3|max:50',
                'description' => 'required',
                'value' => 'required|min:3',
                'image_url' => 'required|min:3'
            ]);

            Promo::create($new);

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

            $var = Promo::findOrFail($id);

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
            $var = Promo::findOrFail($request->id);

            if($request->name == NULL){
                $request->name = $var->name;
            }
            if($request->description == NULL){
                $request->description = $var->description;
            }
            if($request->value == NULL){
                $request->value = $var->value;
            }
            if($request->image_url == NULL){
                $request->image_url = $var->image_url;
            }

            $var->update([
                'name' => $request->name,
                'description' => $request->description,
                'value' => $request->value,
                'image_url' => $request->image_url
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
            $var = Promo::findOrFail($id);
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

    public function getPromoValue(Request $request) {
        $val = Promo::select('value')->where('id', $request->id)->get();

        return $val;
    } 

}
