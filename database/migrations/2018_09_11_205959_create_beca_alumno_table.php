<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecaAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_beca_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');    

            $table->integer('idBeca')->unsigned();
            $table->foreign('idBeca')->references('id')->on('becas')->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_beca_alumno');
    }
}
