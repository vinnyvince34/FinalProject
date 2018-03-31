<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ['preferred_cinema_id', 'name', 'gender', 'birth_date', 'phone_number', 'city', 'email', 'password'];
    
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
