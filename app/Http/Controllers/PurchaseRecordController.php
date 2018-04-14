<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\SomeStoreTraits;

class PurchaseRecordController extends Controller
{
    use SomeStoreTraits;

    public function createPurchaseRecord(Request $request){
        $transaction_details = new Request([
            'customer_id' => $request->customer_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'promo_id' => $request->promo_id
        ]);

        $new_transaction = $this->storeTransaction($transaction_details);

        foreach ($request->seats as $seat){
            $reserve_seat_detail = new Request([
                'seat_id' => $seat->seat_id,
                'transaction_id' => $new_transaction = $new_transaction->id,
                'schedule_id' => $request->schedule_id
            ]);

            $this->storeReservedSeats($reserve_seat_detail);

        }
    }
}
