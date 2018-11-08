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
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->integer('ingresoFamiliarM')->nullable();
                        //Agregado Ahora Último
            $table->tinyInteger('viveConPadre')->default(0);
            $table->tinyInteger('viveConMadre')->default(0);
            $table->tinyInteger('viveConAbuelos')->default(0);
            $table->tinyInteger('viveConTios')->default(0);
            $table->tinyInteger('viveConTutor')->default(0);
            $table->string('causas')->nullable(); //QUE ES ESTO?
            $table->integer('nroConvivientes')->nullable();
            $table->integer('totalHijos')->nullable();
            $table->integer('nroDeHijo')->nullable();

            $table->integer('nroHermaIDOP')->nullable();
            
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
                'Amigo/a de la Familia',
                'Vecino/a',
                'Padrino/Madrina',
                'Otro'])->default('Padre');

            $table->enum('isapreFonasa', [ //Con que relleno esto
                'Isapre', 
                'Dipreca', 
                'Capredena',
                'Fonasa'])->default('Isapre');

            $table->tinyInteger('seguroComple')->default(0);


            

            $table->string('enfermedades')->nullable();
            $table->string('medicamentos')->nullable();
            $table->tinyInteger('esAlergico')->default(0)->nullable();
            $table->string('AlergicoA')->nullable();
            $table->string('observacionesSalud')->nullable($value = true);

            $table->enum('grupoSanguineo', [
                'No lo sé',
                'A+', 
                'A-',
                'AB+',
                'AB-',
                'B+',
                'B-',
                'O+',
                'O-'])->default('O+');

            $table->integer('idAlumno')->unsigned()->unique();
            $table->foreign('idAlumno')->references('id')->on('alumnos');  

            $table->integer('cantidadContactos')->default(0)->nullable();
            $table->string('PNombrePContacto')->nullable($value = true);
            $table->string('SNombrePContacto')->nullable($value = true);
            $table->string('TNombrePContacto')->nullable($value = true);
            $table->string('ApPatPContacto')->nullable($value = true);
            $table->string('ApMatPContacto')->nullable($value = true);
            $table->integer('fonoFijoPContacto')->nullable($value = true);
            $table->integer('fonoCeluPContacto')->nullable($value = true);
            $table->string('emailPContacto')->nullable($value = true);
            $table->enum('parentescoPContacto', [
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
                'Amigo/a de la Familia',
                'Vecino/a',
                'Padrino/Madrina',
                'Otro'])->nullable($value = true);

            $table->string('PNombreSContacto')->nullable($value = true);
            $table->string('SNombreSContacto')->nullable($value = true);
            $table->string('TNombreSContacto')->nullable($value = true);
            $table->string('ApPatSContacto')->nullable($value = true);
            $table->string('ApMatSContacto')->nullable($value = true);
            $table->integer('fonoFijoSContacto')->nullable($value = true);
            $table->integer('fonoCeluSContacto')->nullable($value = true);
            $table->string('emailSContacto')->nullable($value = true);
            $table->enum('parentescoSContacto', [
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
                'Amigo/a de la Familia',
                'Vecino/a',
                'Padrino/Madrina',
                'Otro'])->nullable($value = true);

            $table->string('urlFichaAlumno')->nullable($value = true);

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
        Schema::dropIfExists('ficha_alumno');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
