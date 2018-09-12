<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_responsable', function (Blueprint $table) {
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

            $table->integer('idPersona')->unsigned();
            $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');

            $table->string('descripcion', 40)->nullable($value = true);
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
        Schema::dropIfExists('alumno_responsable');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
