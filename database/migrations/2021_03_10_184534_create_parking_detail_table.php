<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('parking_details');
        Schema::create('parking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parking_id')->unsigned();
            $table->integer('piso_det')->unique();
            $table->integer('espacio_det');
            $table->string('estado_det');
            $table->timestamps();
        });

        
        Schema::table('parking_details', function($table) {
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
        Schema::dropIfExists('parking_detail');
    }
}
