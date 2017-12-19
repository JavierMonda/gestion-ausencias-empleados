<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTlfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadortlfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTrabajadorTlf')->unsigned();
            $table->string('TlfTrabajador',9);
            $table->unique(array('idTrabajadorTlf','TlfTrabajador'));
            $table->foreign('idTrabajadorTlf')->references('id')->on('trabajadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('trabajadortlfs', function(Blueprint $table) {
            $table->dropForeign('trabajadortlfs_idtrabajadortlf_foreign');
        });
        Schema::dropIfExists('trabajadortlfs');
    }
}
