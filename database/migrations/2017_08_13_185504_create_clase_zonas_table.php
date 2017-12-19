<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_zonas', function (Blueprint $table) {
            $table->integer('idZona')->unsigned();
            $table->string('zona',45);
            $table->unique(array('idZona','zona'));
            $table->foreign('idZona')->references('id')->on('clases')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('clase_zonas', function (Blueprint $table) {
            $table->dropForeign('clase_zonas_idzona_foreign');
        });
        Schema::dropIfExists('clase_zonas');
    }
}
