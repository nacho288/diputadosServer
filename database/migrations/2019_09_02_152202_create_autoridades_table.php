<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoridades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('presidente_id')->unsigned()->nullable();
            $table->bigInteger('vice_id')->unsigned()->nullable();
            $table->bigInteger('vice2_id')->unsigned()->nullable();
            $table->bigInteger('parlamentario_id')->unsigned()->nullable();
            $table->bigInteger('admistrativo_id')->unsigned()->nullable();
            $table->bigInteger('subsecretario_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('presidente_id')->references('id')->on('diputados');
            $table->foreign('vice_id')->references('id')->on('diputados');
            $table->foreign('vice2_id')->references('id')->on('diputados');
            $table->foreign('parlamentario_id')->references('id')->on('diputados');
            $table->foreign('admistrativo_id')->references('id')->on('diputados');
            $table->foreign('subsecretario_id')->references('id')->on('diputados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoridades');
    }
}
