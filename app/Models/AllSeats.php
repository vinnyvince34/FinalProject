<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllSeats extends Model
{
     protected $table = "all_seats";
    protected $fillable = ['seat_number', 'theatre_id'];
    
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function xx()
    {
        return $this->belongsTo('App\xx', '');
    }
    // 'App\Models\Theatres', 'theatre_id'
    public function yy()
    {
        return $this->hasOne('App\xx', 'foreign_key');
    }
}
