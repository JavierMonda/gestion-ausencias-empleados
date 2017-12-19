<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreClase',45);
            $table->integer('idTrabajosClase')->unsigned();
            $table->foreign('idTrabajosClase')->references('id')->on('trabajos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('clases', function (Blueprint $table) {
            $table->dropForeign('clases_idtrabajosclase_foreign');
        });
        Schema::dropIfExists('clases');
    }
}
