<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->enum('parentesco', [
                'Padre', 
                'Madre',
                'Padrastro',
                'Madrastra',
                'Tutor/Tutura Legal',
                'Hermano/Hermana',
                'Tío/Tía',
                'Tío Abuelo/Tía Abuela',
                'Primo/Prima',
                'Abuelo/Abuela',
                'Bisabuelo/Bisabuela',
                'Tatarabuelo/Tatarabuela',
                'Otro'])->default('Padre');
            $table->string('otroParentesco', 40)->nullable($value = true);

            $table->tinyInteger('repitencias')->default(0);

            $table->integer('idDireccion')->unsigned()->nullable($value = true);
            $table->foreign('idDireccion')->references('id')->on('direcciones')->onDelete('cascade');

             $table->enum('condicion', [
                'nuevo', 
                'antiguo'])->nullable($value = true)->default('nuevo');

            $table->enum('estado', [
                'Revisar', 
                'Revisado',
                'Aprobado',
                'Rechazado',
                'Otro'])->nullable($value = true)->default('Revisar');

            
            $table->enum('estadoCivilPadres', [
                'Solteros/as', 
                'Casados/as',
                'Viudo/a',
                'Divorciados/as',
                'Separados/as',
                'Convivientes'])->nullable($value = true)->default('Casados/as');

            $table->integer('idPersona')->unsigned();
            $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');

            $table->integer('idApoderado')->unsigned();
            $table->foreign('idApoderado')->references('id')->on('apoderados')->onDelete('cascade');

            $table->integer('idFicha')->unsigned();
            $table->foreign('idFicha')->references('id')->on('ficha_alumno')->onDelete('cascade');

            $table->integer('idCursoActual')->unsigned()->nullable($value = true);
            $table->foreign('idCursoActual')->references('id')->on('cursos')->onDelete('cascade');

            $table->integer('idCursoPostu')->unsigned()->nullable($value = true);
            $table->foreign('idCursoPostu')->references('id')->on('cursos')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
