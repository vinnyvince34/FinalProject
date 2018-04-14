<?php

namespace App\Http\Controllers;

use App\Models\Theatre;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Traits\SomeStoreTraits;

class TransactionController extends Controller
{
    use SomeStoreTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            Transaction::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        try{
//            $new = $this->validate($request, [
//                'user_id' => 'required',
//                'schedule_id' => 'required',
//                'quantity' => 'required',
//                'total_price' => 'required',
//                'promo_id' => 'required'
//            ]);
//
//            Transaction::create($new);
//
//            return response(["Successful!"]);
//
//        } catch(\Exception $e){
//
//            return response([
//                $e->getMessage()
//            ]);
//        }
//    }

    public function store(Request $request){
        if($this->storeTransaction($request))
            return response(
                "Successful!", 200
            );

        return response(
            "Failed", 400
        );
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

            $var = Transaction::findOrFail($id);

            return response([$var], 200);

        } catch (\Exception $e) {

            return response("Transaction not found.", 400);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {
            $var = Transaction::findOrFail($id);

            if($request->user_id == NULL){
                $request->user_id = $var->user_id;
            }
            if($request->quantity == NULL){
                $request->quantity = $var->quantity;
            }
            if($request->total_price == NULL){
                $request->total_price = $var->total_price;
            }
            if($request->promo_id == NULL){
                $request->promo_id = $var->promo_id;
            }

            $var->update([
                'seat_number' => $request->seat_number,
                'theatre_id' => $request->theatre_id,
                'total_price' => $request->total_price,
                'promo_id' => $request->promo_id
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
            $var = Transaction::findOrFail($id);
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
