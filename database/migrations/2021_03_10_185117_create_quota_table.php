<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('quotas');
        Schema::create('quotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parking_detail_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->string('fecha_entrada_cup');
            $table->timestamps();
        });

        Schema::table('quotas', function($table) {
            $table->foreign('parking_detail_id')->references('id')->on('parking_details');
        });

        Schema::table('quotas', function($table) {
            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::table('quotas', function($table) {
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quota');
    }
}
