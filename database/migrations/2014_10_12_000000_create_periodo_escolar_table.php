<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoEscolarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_escolar', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaInicio');
            $table->date('fechaTermino');
            $table->integer('anio');
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
        Schema::dropIfExists('periodo_escolar');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
    }
}
