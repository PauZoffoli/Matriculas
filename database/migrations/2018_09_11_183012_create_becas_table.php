<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();            $table->string('descripcion');
            $table->integer('porcentaje');
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
        Schema::dropIfExists('becas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
