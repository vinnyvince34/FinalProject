<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['preferred_cinema_id', 'name', 'gender', 'birth_date', 'phone_number', 'city', 'email', 'password'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','user_id');
    }

    public function credit_card(){
        return $this->hasMany('App\Models\CreditCard', 'user_id');
    }

    public function preferred_cinema(){
        return $this->hasOne('App\Models\Cinema', 'preferred_cinema_id');
    }
}
