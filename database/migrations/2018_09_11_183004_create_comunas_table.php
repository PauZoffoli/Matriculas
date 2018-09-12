<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            
            $table->string('codigoUnico');
            $table->integer('idProvincia')->unsigned();
            $table->foreign('idProvincia')->references('id')->on('provincias')->onDelete('cascade');

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
        Schema::dropIfExists('comunas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
