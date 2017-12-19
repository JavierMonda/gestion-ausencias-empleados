<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtensionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extensiones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('numPuerto')->unsigned();
            $table->integer('idDepartamento')->unsigned();
            $table->foreign('idDepartamento')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('extensiones', function (Blueprint $table) {
            $table->dropForeign('extensiones_iddepartamento_foreign');
        });
        Schema::dropIfExists('extensiones');
    }
}
