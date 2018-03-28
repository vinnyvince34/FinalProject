<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theatres', function (Blueprint $table) {
            $table->increments('theatre_id');
            $table->unsignedInteger('cinema_id');
            $table->unsignedInteger('type_id');
            $table->string('theatre_number', 5);
            
            $table->foreign('type_id')->references('type_id')->on('room_types');
            $table->foreign('cinema_id')->references('cinema_id')->on('cinemas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theatres');
    }
}
