<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id'); // transaction_id
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('schedule_id');
            $table->tinyInteger('quantity');
            $table->integer('total_price');
            $table->string('promo_id');
            
            $table->foreign('customer_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('transactions');
    }
}
