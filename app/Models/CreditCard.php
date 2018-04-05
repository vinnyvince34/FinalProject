<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $table = "credit_cards";
    protected $fillable = ['id', 'user_id', 'first_name', 'last_name', 'address', 'zip_code', 'city'];

//    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function user(){
        return $this->belongsTo('App\Models\Customer', 'user_id');
    }

}
