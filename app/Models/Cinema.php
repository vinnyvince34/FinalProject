<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $table = "cinemas";
    protected $fillable = ['cinema_name', 'city', 'address', 'cinema_what'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function user()
    {
        return $this->hasOne('App\Models\Customer', 'preferred_cinema_id');
    }

    public function theatre(){
        return $this->hasMany('App\Models\Theatre', 'cinema_id');
    }
    
}
