<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAusenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ausencias', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fechaAusencia');
            $table->enum('tipoAusencia',['baja','vacaciones','absentismo','permiso']);
            $table->string('descripcion',90)->nullable();
            $table->integer('idTrabajador')->unsigned();
            $table->foreign('idTrabajador')->references('id')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
            $table->unique(['fechaAusencia', 'idTrabajador']);
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
        Schema::table('ausencias', function(Blueprint $table) {
            $table->dropForeign('ausencias_idtrabajador_foreign');
        });
        Schema::dropIfExists('ausencias');
    }
}
