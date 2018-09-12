<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('ingresoFamiliarM');

            $table->integer('causas'); //QUE ES ESTO?

            $table->integer('nroConvivientes');
            $table->integer('totalHijos');
            $table->integer('nroDeHijo');

            $table->integer('nroHermaIDOP');
            
            $table->enum('tenenciaVivienda', [ //Con que relleno esto
                'Arrendatario', 
                'Propietario',
                'Allegado',
                'Usufructuario'])->default('Arrendatario');

        
            $table->enum('estudiaCon', [
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
                'Amigo/Amiga',
                'Otro'])->default('Padre');

            $table->enum('isapreFonasa', [ //Con que relleno esto
                'Isapre', 
                'Fonasa'])->default('Isapre');

            $table->tinyInteger('seguroComple')->default(0);
            $table->string('enfermedades');
            $table->string('medicamentos');
            $table->tinyInteger('esAlergico')->default(0);
            $table->string('AlergicoA')->default(0);

            $table->enum('grupoSanguineo', [
                'A+', 
                'A-',
                'AB+',
                'AB-',
                'B+',
                'B-',
                'O+',
                'O-'])->default('O+');

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');    

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_alumno');
    }
}
