<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoOficinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_oficina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('oficina_id')->unsigned();
            $table->string('rol');

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('oficina_id')->references('id')->on('oficina');

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
        Schema::dropIfExists('empleado_oficina');
    }
}
