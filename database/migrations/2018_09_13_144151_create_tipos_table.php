<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();            $table->string('nombre', 45);
            $table->string('descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}

/*  
Editar Editar
Copiar Copiar
Borrar Borrar
1
NULL
NULL
ApoderadoPostulante
Apoderado que aún no firma contrato con la escuela...

Editar Editar
Copiar Copiar
Borrar Borrar
2
NULL
NULL
Apoderado
Apoderado permanente del presente año

Editar Editar
Copiar Copiar
Borrar Borrar
3
NULL
NULL
Alumno
Alumno permanente del presente año

Editar Editar
Copiar Copiar
Borrar Borrar
4
NULL
NULL
AlumnoPostulante
Alumno que aún el apoderado no firma contrato con ...

Editar Editar
Copiar Copiar
Borrar Borrar
5
NULL
NULL
Revisor
Revisores de la postulación

Editar Editar
Copiar Copiar
Borrar Borrar
6
NULL
NULL
Administrador
Administrador de la app

Editar Editar
Copiar Copiar
Borrar Borrar
7
NULL
NULL
Padres
El padre del Alumno

Editar Editar
Copiar Copiar
Borrar Borrar
9
NULL
NULL
Contacto
El primer contacto del Alumno*/
