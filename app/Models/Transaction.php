<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
//    protected $fillable = ['user_id', 'schedule_id', 'quantity', 'total_price', 'promo_id'];
    protected $fillable = ['customer_id', 'quantity', 'total_price', 'promo_id'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    
    public $incrementing = false;
    
    public function reserved_seat()
    {
        return $this->hasMany('App\Models\ReservedSeats','transaction_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function promo(){
        return $this->belongsTo('App\Models\Promo', 'promo_id');
    }
}
