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
            $table->uuid('id'); // transaction_id
            $table->uuid('user_id');
            $table->uuid('schedule_id');
            $table->tinyInteger('quantity');
            $table->integer('total_price');
            $table->uuid('promo_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('promo_id')->references('id')->on('promo');

            $table->timestamps();
        });
        
        DB::statement('ALTER TABLE  users ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
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
