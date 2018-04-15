<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return Customer::all();
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //'email' => 'unique:users,email_address,'.$user->id //ni kalo update, tp emailnya ga diganti
            $new = $this->validate($request, [
                'preferred_cinema_id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'phone_number' => 'required',
                'city' => 'required|min:3',
                'email' => 'required|min:3',
                'password' =>  'required'
            ]);

            Customer::create($new);

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

            $var = Customer::findOrFail($id);

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Customer not found.", 400);

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

            $var = Customer::findOrFail($request->id);

            if($request->preferred_cinema_id == NULL){
                $request->preferred_cinema_id = $var->preferred_cinema_id;
            }
            if($request->name == NULL){
                $request->name = $var->name;
            }
            if($request->gender == NULL){
                $request->gender = $var->gender;
            }
            if($request->birth_date == NULL){
                $request->birth_date = $var->birth_date;
            }
            if($request->address == NULL){
                $request->address = $var->address;
            }
            if($request->phone_number == NULL){
                $request->phone_number = $var->phone_number;
            }
            if($request->email == NULL){
                $request->email = $var->remail;
            }
            if($request->password == NULL){
                $request->password = $var->password;
            }

            $var->update([
                'preferred_cinema_id' => $request->preferred_cinema_id,
                'name' => $request->name,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => $request->password
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
            $var = Customer::findOrFail($id);
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
