<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = "promos";
    protected $fillable = ['value'];
    // attributes still unknown

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function transaction(){
        return $this->belongsTo('App\Models\Transaction', 'promo_id');
    }
}
