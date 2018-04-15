<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = "promos";
    protected $fillable = ['name', 'description', 'value', 'image_url'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function transaction(){
        return $this->hasMany('App\Models\Transaction', 'promo_id');
    }
}
