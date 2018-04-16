<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedules";
    protected $fillable = ['movie_id', 'theatre_id', 'time'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function movie(){
        return $this->hasOne('App\Models\Movie', 'movie_id');
    }

    public function theatre(){
        return $this->belongsTo('App\Models\Theatre', 'theatre_id');
    }

    public function reserved_seats(){
        return $this->hasMany('App\Models\ReservedSeats', 'schedule_id');
    }
}
