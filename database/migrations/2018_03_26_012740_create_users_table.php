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
            $table->uuid('id');
            $table->uuid('preferred_cinema_id');
            $table->string('name');
            $table->string('gender', 1);
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('password'); 
            
            $table->primary('id');
            $table->foreign('preferred_cinema_id')
                ->references('id')
                ->on('cinemas')
                ->onDelete('cascade');
            
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
        Schema::dropIfExists('users');
    }
}
