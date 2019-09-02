<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubbloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subbloques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bloque_id')->unsigned();
            $table->string('nombre');
            $table->string('logo')->nullable();
            $table->bigInteger('presidente_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('presidente_id')->references('id')->on('diputados');
            $table->foreign('bloque_id')->references('id')->on('bloques');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subbloques');
    }
}
