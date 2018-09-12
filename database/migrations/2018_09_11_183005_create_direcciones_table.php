<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idComuna')->unsigned();
            $table->foreign('idComuna')->references('id')->on('comunas')->onDelete('cascade');    
            $table->string('calle');
            $table->string('nroCalle');
            $table->string('bloqueTorre');
            $table->string('dpto');

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
        Schema::dropIfExists('direcciones');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
