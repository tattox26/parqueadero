<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('hour_details');
        Schema::create('hour_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parking_id')->unsigned();
            $table->integer('rate_id')->unsigned();
            $table->string('fecha_apertura_hor');
            $table->string('fecha_cierre_hor');
            $table->string('dia_hor');
            $table->string('estado_hor');
            $table->timestamps();
        });

        Schema::table('hour_details', function($table) {
            $table->foreign('parking_id')->references('id')->on('parkings');
        });

        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hour_detail');
    }
}
