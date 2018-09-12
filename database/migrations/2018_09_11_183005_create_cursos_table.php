<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('nivel');
            $table->enum('basicaMedia', [
                'Básico',
                'Media'])->default('Básico');
            $table->integer('arancelAnual');

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
        Schema::dropIfExists('cursos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
