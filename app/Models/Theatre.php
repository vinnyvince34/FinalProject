<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    protected $table = "theatres";
    protected $fillable = ['cinema_id', 'type_id', 'theatre_number'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function roomType(){
        return $this->belongsTo('App\Models\RoomType', 'type_id');
    }

    public function cinema(){
        return $this->belongsTo('App\Models\Cinema', 'cinema_id');
    }

    public function all_seats(){
        return $this->hasMany('App\Models\AllSeats', 'theatre_id');
    }

}
