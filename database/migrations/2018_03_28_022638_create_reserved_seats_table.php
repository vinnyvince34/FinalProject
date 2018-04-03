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
            $table->uuid('id');
            $table->uuid('seat_id');
            $table->uuid('transaction_id');
            $table->uuid('schedule_id');

            $table->primary('id');
            $table->foreign('seat_id')->references('id')->on('all_seats');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();
        });

        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        DB::statement('ALTER TABLE  users ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
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
