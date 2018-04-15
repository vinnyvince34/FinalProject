<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = "room_types";
    protected $fillable = ['type_name', 'weekday_price', 'weekend_price'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function theatre(){
        return $this->hasMany('App\Models\Theatre', 'type_id');
    }
}
