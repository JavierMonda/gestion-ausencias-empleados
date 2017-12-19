<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreDepartamento',45)->unique();
            $table->string('TlfDepartamento',9);
            $table->string('JefeDepartamento',45);
            $table->integer('idCentroDepartamento')->unsigned();
            $table->foreign('idCentroDepartamento')->references('id')->on('centros')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamentos', function (Blueprint $table) {
            $table->dropForeign('departamentos_idcentrodepartamento_foreign');
        });
        Schema::dropIfExists('departamentos');
    }
}
