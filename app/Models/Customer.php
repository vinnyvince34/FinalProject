<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = "customers";
    protected $fillable = ['preferred_cinema_id', 'name', 'gender', 'birth_date', 'phone_number', 'city', 'email', 'password', 'is_verified'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    protected $hidden = ['password'];
    
    public $incrementing = false;
    
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','customer_id');
    }

    public function credit_card(){
        return $this->hasMany('App\Models\CreditCard', 'customer_id');
    }

    public function preferred_cinema(){
        return $this->belongsTo('App\Models\Cinema', 'preferred_cinema_id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
