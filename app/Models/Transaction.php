<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
//    protected $fillable = ['user_id', 'schedule_id', 'quantity', 'total_price', 'promo_id'];
    protected $fillable = ['user_id', 'quantity', 'total_price', 'promo_id'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function reserved_seat()
    {
        return $this->hasMany('App\Models\ReservedSeats','transaction_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\Customer', 'user_id');
    }

    public function promo(){
        return $this->hasOne('App\Models\Promo', 'promo_id');
    }
}
