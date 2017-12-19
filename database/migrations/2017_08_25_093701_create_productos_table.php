<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',50);
            $table->string('nombreProducto',45);
            $table->integer('cantidad')->unsigned();
            $table->text('descripcionProducto')->nullable();
            $table->string('ubicacion',45);
            $table->integer('idDepartamentoProducto')->unsigned();
            $table->foreign('idDepartamentoProducto')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_iddepartamentoproducto_foreign');
        });
        Schema::dropIfExists('productos');
    }
}
