<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('pelicula_director', function (Blueprint $table) {
            $table->increments('id');
            // Campos FK
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('director_id');
            // Relaciones
            $table->foreign('pelicula_id')->references('id')
                  ->on('peliculas')->onDelete('cascade');
            $table->foreign('director_id')->references('id')
                  ->on('directores')->onDelete('cascade');
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
        Schema::dropIfExists('pelicula_director');
        Schema::dropIfExists('directores');
    }
}
