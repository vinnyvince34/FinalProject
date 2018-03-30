<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $table = "cinemas";
    protected $fillable = ['cinema_name', 'city', 'address', 'cinema_what'];
    
    protected $primaryKey = "id";
    
    public $incrementing = false;
    
    public function xx()
    {
        return $this->belongsTo('App\xx', '');
    }
    
}
