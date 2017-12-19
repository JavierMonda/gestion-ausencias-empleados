<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaIncidencia');
            $table->text('descripcionIncidencia');
            $table->enum('estadoIncidencia',['pendiente','solucionado'])->default('pendiente');
            $table->text('observacionesIncidencia')->nullable();
            $table->integer('idDepartamentoIncidencia')->unsigned();
            $table->foreign('idDepartamentoIncidencia')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('incidencias', function (Blueprint $table) {
            $table->dropForeign('incidencias_iddepartamentoincidencia_foreign');
        });
        Schema::dropIfExists('incidencias');
    }
}
