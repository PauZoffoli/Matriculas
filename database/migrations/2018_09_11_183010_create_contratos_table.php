<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->integer('idApoderado')->unsigned()->nullable($value = true);
            $table->foreign('idApoderado')->references('id')->on('apoderados')->onDelete('cascade');

            $table->string('urlContrato');
            $table->string('urlPagare');
            $table->string('urlContratoF'); //refiere al contrato firmado
            $table->string('urlPagareF'); //refiere al pagare firmado

            $table->integer('nroCuotas');

            $table->timestamp('fechaContrato')->useCurrent();
            $table->integer('anioAContratar');

            $table->integer('totalAPagar');
     

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
        Schema::dropIfExists('contratos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
