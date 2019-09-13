<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('presidente_id')->unsigned()->nullable();
            $table->bigInteger('vice_id')->unsigned()->nullable();
            $table->text('descripcion')->nullable();
            $table->text('reunion')->nullable();
            $table->bigInteger('secretario_id')->unsigned()->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('presidente_id')->references('id')->on('diputados');
            $table->foreign('vice_id')->references('id')->on('diputados');
            $table->foreign('secretario_id')->references('id')->on('empleados');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internas');
    }
}
