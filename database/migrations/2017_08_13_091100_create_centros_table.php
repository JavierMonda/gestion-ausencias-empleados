<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            $table->string('nombreCentro',45);
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')
                 ->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('centros', function (Blueprint $table) {
            $table->dropForeign('centros_idempresa_foreign');
        });
        Schema::dropIfExists('centros');

    }
}
