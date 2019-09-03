<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiputadoEspecialeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diputado_especiale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('diputado_id')->unsigned()->nullable();
            $table->bigInteger('especiale_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('diputado_id')->references('id')->on('diputados');
            $table->foreign('especiale_id')->references('id')->on('especiales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diputado_especiale');
    }
}
