<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('usuarios')->onDelete('cascade');    

            $table->integer('idRol')->unsigned();
            $table->foreign('idRol')->references('id')->on('roles')->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rol');
    }
}
