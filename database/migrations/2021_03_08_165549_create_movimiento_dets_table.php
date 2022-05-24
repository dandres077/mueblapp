<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_dets', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->unsignedBigInteger('movimiento_id')->index()->nullable(); 
            $table->date('fecha')->nullable(); 
            $table->unsignedBigInteger('tipo_mov')->index()->nullable(); 
            $table->unsignedBigInteger('producto_id')->index()->nullable(); 
            $table->unsignedBigInteger('almacen_id')->index()->nullable(); 
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('movimiento_id')->references('id')->on('movimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_mov')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_dets');
    }
}
