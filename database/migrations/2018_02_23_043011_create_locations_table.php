<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //`id`, `mac`, `fecha`, `hora`, `latitud`, `longitud`
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac');
            $table->string('fecha');
            $table->string('hora');
            $table->string('latitud');
            $table->string('longitud');
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
        Schema::dropIfExists('locations');
    }
}
