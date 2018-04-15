<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllSeats extends Model
{
    protected $table = "all_seats";
    protected $fillable = ['seat_number', 'theatre_id'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function reserved_seats()
    {
        return $this->hasMany('App\Models\ReservedSeats', 'seat_id');
    }
    // 'App\Models\Theatres', 'theatre_id'
    public function theatre(){
        return $this->belongsTo('App\Models\Theatre', 'theatre_id');
    }
}
