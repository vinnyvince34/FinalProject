<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_seats', function (Blueprint $table) {
            $table->unsignedInteger('seat_id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('schedule_id');
            
            $table->foreign('seat_id')->references('seat_id')->on('all_seats');
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions');
            $table->foreign('schedule_id')->references('schedule_id')->on('schedules');
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
        Schema::dropIfExists('reserved_seats');
    }
}
