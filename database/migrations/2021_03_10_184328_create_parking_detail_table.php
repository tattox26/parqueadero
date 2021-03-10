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
        Schema::create('parking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quota_id')->unsigned();
            $table->string('piso_det');
            $table->string('espacio_det');
            $table->string('estado_det');
            $table->timestamps();
        });

        Schema::table('parking_details', function($table) {
            $table->foreign('quota_id')->references('id')->on('quotas');
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
