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
            $table->uuid('id');
            $table->uuid('cinema_id');
            $table->uuid('type_id');
            $table->string('theatre_number', 5);

            $table->primary('id');
            $table->foreign('type_id')->references('id')->on('room_types');
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->timestamps();
        });

        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        DB::statement('ALTER TABLE  theatres ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
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
