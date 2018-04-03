<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * BETA BETA BETA BETA BETA BETA
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->uuid('id');
            $table->integer('value'); // if decimal ( 0 < x < 1 ), then its a percentage discount; if x > 1, is discount by value

            $table->primary('id');
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
        Schema::dropIfExists('promos');
    }
}
