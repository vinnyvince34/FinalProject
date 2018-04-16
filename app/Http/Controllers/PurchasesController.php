<?php

namespace App\Http\Controllers;


use App\Traits\StoreMethods;
use Illuminate\Http\Request;
use Stripe\{Stripe, Charge, Customer, Token};
use App\Models\{Transaction, ReservedSeats, RoomType};

class PurchasesController extends Controller
{
    use StoreMethods;
    //
    // i need: customer_id, schedule_id, array[seat_id], promo_id, quantity, total_price

    public function store(Request $request){


        Stripe::setApiKey(config('services.stripe.secret'));

//        dd(config('services.stripe.secret'));

        $card = Token::create(array(
            "card" => array(
                "number" => "4242424242424242",
                "exp_month" => 4,
                "exp_year" => 2019,
                "cvc" => "314"
            )
        ));

        $customer = Customer::create(array(

            'email' => $request->stripeEmail,
            'source' => $request->stripeToken

        ));

        Charge::create(array(

            'customer' => $customer->id,
            'amount' =>  10000000,                // amount -> nembak harga ke si room_type
            'currency' => 'idr'

        ));

        $transaction_details = new Request([
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'promo_id' => $request->promo_id
        ]);

        $new_transaction = $this->storeTransaction($transaction_details)[0];

        $reserve_seat_detail = new Request([
            'seat_id' => $request->seat_id,
            'transaction_id' => $new_transaction = $new_transaction->id,
            'schedule_id' => $request->schedule_id
        ]);

        $new_biji = $this->storeReservedSeats($reserve_seat_detail);



        return response("Purchase successful", 200);

    }
}
