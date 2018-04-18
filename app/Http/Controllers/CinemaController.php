<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cinema::all();
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
                'cinema_name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'cinema_what' => 'required'
            ]);

            Cinema::create($new);

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

            $var = Cinema::findOrFail($id);

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Cinema not found.", 400);

        }
    }

    public function showCity(Request $request) {
        try {
            $city = Cinema::select('city')->get();
            return $city;
        } catch(Exception $e) {
            return response($e->getMessage());
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

            $var = Cinema::findOrFail($request->id);

            if($request->cinema_name == NULL){
                $request->cinema_name = $var->cinema_name;
            }
            if($request->city == NULL){
                $request->city = $var->city;
            }
            if($request->address == NULL){
                $request->address = $var->address;
            }
            if($request->cinema_what == NULL){
                $request->cinema_what = $var->cinema_what;
            }

            $var->update([
                'cinema_name' => $request->cinema_name,
                'city' => $request->city,
                'address' => $request->address,
                'cinema_what' => $request->cinema_what,
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
            $var = Cinema::findOrFail($id);
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
