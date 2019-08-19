<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiputadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diputados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->date('fecha_naciminento');
            $table->string('foto')->nullable();
            $table->string('estado_civil');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('departamento');
            $table->string('telefono_particular')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('email')->nullable();
            $table->string('profesion')->nullable();
            $table->string('domicilio_en_santa_fe');
            $table->string('conyugue')->nullable();
            $table->string('secretaria')->nullable();
            $table->string('telefono_particular_secretaria')->nullable();
            $table->string('telefono_celular_secretaria')->nullable();
            $table->string('email_secretaria')->nullable();
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
        Schema::dropIfExists('diputados');
    }
}
