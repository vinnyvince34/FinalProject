<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_seats', function (Blueprint $table) {
            $table->increments('seat_id');
            $table->string('seat_number');
            $table->unsignedInteger('theatre_id');
            
            $table->foreign('theatre_id')->references('theatre_id')->on('theatres');
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
        Schema::dropIfExists('all_seats');
    }
}
