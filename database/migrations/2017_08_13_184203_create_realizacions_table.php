<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizacions', function (Blueprint $table) {
            $table->integer('idTrabajosRealiza')->unsigned();
            $table->integer('idTrabajadorRealiza')->unsigned();
            $table->unique(array('idTrabajosRealiza','idTrabajadorRealiza'));
            $table->date('fechaRealiza');
            $table->timestamp('horaIni')->nullable();
            $table->timestamp('horaFin')->nullable();
            $table->foreign('idTrabajosRealiza')->references('id')->on('trabajos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('idTrabajadorRealiza')->references('id')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('realizacions', function (Blueprint $table) {
            $table->dropForeign('realizacions_idtrabajadorrealiza_foreign');
            $table->dropForeign('realizacions_idtrabajosrealiza_foreign');
        });
        Schema::dropIfExists('realizacions');
    }
}
