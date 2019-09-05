<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->unsignedBigInteger('presidente_id')->nullable();
            $table->foreign('presidente_id')->references('id')->on('diputados');

            $table->unsignedBigInteger('vice_id')->nullable();
            $table->foreign('vice_id')->references('id')->on('diputados');

            $table->unsignedBigInteger('vice2_id')->nullable();
            $table->foreign('vice2_id')->references('id')->on('diputados');

            $table->unsignedBigInteger('parlamentario_id')->nullable();
            $table->foreign('parlamentario_id')->references('id')->on('diputados');

            $table->unsignedBigInteger('admistrativo_id')->nullable();
            $table->foreign('admistrativo_id')->references('id')->on('diputados');

            $table->unsignedBigInteger('subsecretario_id')->nullable();
            $table->foreign('subsecretario_id')->references('id')->on('diputados');

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
        Schema::dropIfExists('autoridades');
    }
}
