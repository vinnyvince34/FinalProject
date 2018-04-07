<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "movies";
    protected $fillable = ['movie_name', 'duration', 'casts', 'director', 'rating', 'genre', 'synopsis', 'image_url', 'trailer_url', 'status'];

    protected $casts = ['id' => 'string'];
    protected $primaryKey = "id";

    public $incrementing = false;

    public function schedule(){
        return $this->belongsTo('App\Models\Schedule', 'movie_id');
    }
    
    
}
