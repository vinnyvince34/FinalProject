<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('movie_name');
            $table->integer('duration');
            $table->string('casts');
            $table->string('director');
            $table->string('rating');
            $table->string('genre');
            $table->string('synopsys');
            $table->string('image_url');
            $table->string('trailer_url');
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
        Schema::dropIfExists('movies');
    }
}
