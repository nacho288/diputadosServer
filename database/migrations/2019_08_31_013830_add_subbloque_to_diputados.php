<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubbloqueToDiputados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diputados', function (Blueprint $table) {
            $table->bigInteger('subbloque_id')->unsigned()->nullable();
            $table->foreign('subbloque_id')->references('id')->on('subbloques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diputados', function (Blueprint $table) {
            $table->dropForeign(['subbloque_id']);
            $table->dropColumn('subbloque_id');
        });
    }
}
