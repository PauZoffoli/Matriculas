<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('PNombre');
            $table->string('SNombre')->nullable($value = true);
            $table->string('TNombre')->nullable($value = true);
            $table->string('ApPat');
            $table->string('ApMat')->nullable($value = true);

            $table->integer('fonoFijo')->nullable($value = true);
            $table->integer('fonoCelu')->nullable($value = true);

            $table->integer('idUser')->unsigned()->nullable($value = true);
            $table->foreign('idUser')->references('id')->on('personas')->onDelete('cascade');

            $table->string('rut')->nullable($value = true);

            $table->enum('tipoPersona', [
                'Apoderado', 
                'Alumno',
                'Revisor',
                'Secretariado',
                'Administrador',
                'Padre',
                'Madre',
                'PrimerContacto',
                'SegundoContacto',
                'Otro'])->default('Apoderado');

            $table->enum('genero', [
                'Mujer',
                'Hombre'])->default('Mujer')->nullable($value = true);

            $table->string('email')->nullable($value = true);

            $table->dateTime('fechaNacimiento')->nullable($value = true);
            $table->dateTime('fechaDefuncion')->nullable($value = true);

            $table->enum('estadoCivil', [
                'Soltero/a', 
                'Casado/a',
                'Viudo/a',
                'Divorciado/a',
                'Separado/a',
                'Conviviente'])->nullable($value = true)->default('Soltero/a')->nullable($value = true);
;


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas;');
    }
}
