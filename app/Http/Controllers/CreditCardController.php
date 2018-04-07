<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditCard;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CreditCard::all();
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

            $new = $this->validate($request->all(), [
                'id' => 'required|digits:8|unique:credit_cards,id',
                'user_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'zip_code' => 'required|min:3',
                'city' => 'required|min:3'
            ]);

            CreditCard::create($new);

            return response(
                'Created', 201
            );
        } catch(\Exception $e){

            return response(
                $e->getMessage(),400
            );
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

            $var = CreditCard::findOrFail($id);

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

            $var = CreditCard::findOrFail($id);

            if($request->id == NULL){
                $request->id = $var->id;
            }
            if($request->user_id == NULL){
                $request->user_id = $var->user_id;
            }
            if($request->first_name == NULL){
                $request->first_name = $var->first_name;
            }
            if($request->last_name == NULL){
                $request->last_name = $var->last_name;
            }
            if($request->address == NULL){
                $request->address = $var->address;
            }
            if($request->zip_code == NULL){
                $request->zip_code = $var->zip_code;
            }
            if($request->city == NULL){
                $request->city = $var->city;
            }

            $var->update([
                'id' => $request->id,
                'user_id' => $request->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'city' => $request->city
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
            $var = CreditCard::findOrFail($id);
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
