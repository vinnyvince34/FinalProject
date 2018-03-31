<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['user_id', 'schedule_id', 'quantity', 'total_price', 'promo_id'];
    
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
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
