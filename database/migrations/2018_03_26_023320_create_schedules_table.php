<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('cinema_id');
            $table->unsignedInteger('type_id');
            $table->dateTime('time');

            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('cinema_id')->references('cinema_id')->on('cinemas');
            $table->foreign('type_id')->references('type_id')->on('room_types');

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
        Schema::dropIfExists('schedules');
    }
}
