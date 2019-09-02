<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiputadoInternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diputado_interna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('diputado_id')->unsigned()->nullable();
            $table->bigInteger('interna_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('diputado_id')->references('id')->on('diputados');
            $table->foreign('interna_id')->references('id')->on('internas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diputado_interna');
    }
}
