<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPadreIdMadreAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Agregamos id padre y id madre para no perder la relación en caso de bugs
            Schema::table('alumnos', function (Blueprint $table){

                $table->integer('idPadre')->unsigned()->nullable($value = true);
                $table->foreign('idPadre')->references('id')->on('personas');
                $table->integer('idMadre')->unsigned()->nullable($value = true);
                $table->foreign('idMadre')->references('id')->on('personas');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('alumnos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
