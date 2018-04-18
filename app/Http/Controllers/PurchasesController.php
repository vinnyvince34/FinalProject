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
        // dd($request);
        $total_price = AllSeats::findOrFail($request->seat_id)->theatre->roomType->weekday_price;
        // return $total_price;

        Stripe::setApiKey(config('services.stripe.secret'));

        $user = Customer::create(array(
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ));

        // $card = $stripe->cards()->create($customer->id, $request->stripeToken);
        $charge = Charge::create(array(
            'customer' => $user->id,
            'amount' =>  $total_price*100,                // amount -> nembak harga ke si room_type
            'currency' => 'idr'
        ));

        // return $charge;

        $transaction_details = new Request([
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'promo_id' => $request->promo_id
        ]);

        // return $transaction_details;

        // return "hi";

        $new_transaction = $this->storeTransaction($transaction_details)[0];

        // return "hi";

        $reserve_seat_detail = new Request([
            'seat_id' => $request->seat_id,
            'transaction_id' => $new_transaction = $new_transaction->id,
            'schedule_id' => $request->schedule_id
        ]);

        // return $reserve_seat_detail;

        $new_biji = $this->storeReservedSeats($reserve_seat_detail);

        return response("Purchase successful", 200);
    }
}
