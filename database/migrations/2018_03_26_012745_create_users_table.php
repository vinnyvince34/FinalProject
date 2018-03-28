<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('preferred_cinema_id');
            $table->string('name');
            $table->string('gender', 1);
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('city');
            $table->string('email');
            $table->string('password');
            
            $table->foreign('preferred_cinema_id')->references('cinema_id')->on('cinemas');
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
        Schema::dropIfExists('users');
    }
}
