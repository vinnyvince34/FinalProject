<?php

namespace App\Http\Controllers;


use App\Traits\StoreMethods;
use Illuminate\Http\Request;
use Stripe\{Stripe, Charge, Customer, Token};
use App\Models\{Transaction, ReservedSeats, RoomType, AllSeats};


class PurchasesController extends Controller
{
    use StoreMethods;
    //
    // i need: customer_id, schedule_id, array[seat_id], promo_id, quantity, total_price

    public function store(Request $request){
        $total_price = AllSeats::findOrFail($request->seat_id)->theatre->roomType->weekday_price;

        Stripe::setApiKey(config('services.stripe.secret'));


        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ));

        Charge::create(array(
            'customer' => $customer->id,
            'amount' =>  $total_price*100,                // amount -> nembak harga ke si room_type
            'currency' => 'idr'
        ));

        $transaction_details = [
            'customer_id' => $request->user()->id,
            'quantity' => 1,
            'total_price' => $total_price,
            'promo_id' => $request->promo_id
        ];

        $new_transaction = $this->storeTransaction($transaction_details);

        $reserve_seat_detail = new Request([
            'seat_id' => $request->seat_id,
            'transaction_id' => $new_transaction->id,
            'schedule_id' => $request->schedule_id
        ]);

        $new_biji = $this->storeReservedSeats($reserve_seat_detail);

        return response("Purchase successful", 200);
    }
}
