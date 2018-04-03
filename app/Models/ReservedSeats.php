<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedSeats extends Model
{
    protected $table = "transactions";
    protected $fillable = ['seat_id', 'transaction_id', 'schedule_id'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    
    // 'App\Models\Transaction', 'transaction_id'
    // 'App\Models\Schedule', 'schedule_id'
    
    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule', 'schedule_id');
    }

    public function all_seats(){
        return $this->belongsTo('App\Models\AllSeats', 'seat_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction','transaction_id');
    }
}
