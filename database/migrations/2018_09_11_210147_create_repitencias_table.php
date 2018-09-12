<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepitenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repitencias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');    

            $table->integer('idCurso')->unsigned();
            $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repitencias');
    }
}
