<?php

namespace App\Traits;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;
use App\Models\ReservedSeats;
use App\Models\Transaction;


trait StoreMethods {

    use ValidatesRequests;

    public function brandsAll() {
        // Get all the brands from the Brands Table. example.
        //$brands = Brand::all();
        return 'a';
    }

    public function storeReservedSeats(Request $request){
        try{
//            dd($request);
            $new = $this->validate($request, [
                'seat_id' => 'required',
                'transaction_id' => 'required',
                'schedule_id' => 'required'
            ]);

            $new = ReservedSeats::create($new);
//            dd($new);
            return $new;

        } catch(\Exception $e){
            dd($e);
            // return response([
            //     $e
            // ], 400);
        }
    }

    public function storeTransaction(Request $request){
        try{
            $var = $this->validate($request, [
                'user_id' => 'required',
                'quantity' => 'required',
                'total_price' => 'required',
                'promo_id' => 'required'
            ]);
            // dd($var);

            $new = Transaction::create($var);

            //return last Transaction with its id (since somehow creating does not return id
            $matchThese = ['user_id' => $new->user_id, 'created_at' => $new->created_at];
            $new = Transaction::where($matchThese)->get();

            return Collection::unwrap($new);

        } catch(\Exception $e){

            // return response([$e]);
            dd($e);
        }
    }

}