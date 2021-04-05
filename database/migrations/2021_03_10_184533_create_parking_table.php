<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('parkings');
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_par');
            $table->string('direccion_par');
            $table->integer('capacidad_par');
            $table->string('ruta_par');
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
        Schema::dropIfExists('parking');
    }
}
