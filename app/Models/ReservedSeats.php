<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedSeats extends Model
{
    protected $table = "transactions";
    protected $fillable = ['seat_id', 'transaction_id', 'schedule_id'];
    
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    
    // 'App\Models\Transaction', 'transaction_id'
    // 'App\Models\Schedule', 'schedule_id'
    public function xx()
    {
        return $this->belongsTo('App\xx', '');
    }
    
    public function yy()
    {
        return $this->hasOne('App\xx', 'foreign_key');
    }
    
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','user_id');
    }
}
