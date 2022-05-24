<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->index()->nullable();
            $table->unsignedBigInteger('producto_id')->index()->nullable();
            $table->unsignedBigInteger('compras_id')->index()->nullable();
            $table->date('fechaent')->nullable(); 
            $table->decimal('cantidad', 10, 1)->nullable(); 
            $table->decimal('costo', 10, 1)->nullable(); 
            $table->decimal('pvp', 10, 1)->nullable(); 
            $table->decimal('impuesto', 10, 1)->nullable(); 
            $table->decimal('retencion', 10, 1)->nullable(); 
            $table->decimal('dcto1', 10, 1)->nullable(); 
            $table->decimal('dcto2', 10, 1)->nullable(); 
            $table->enum('liberado',['Si', 'No'])->default('No');
            $table->integer('documento_pre')->nullable();
            $table->integer('documento_pre_det')->nullable();
            $table->unsignedBigInteger('moneda_id')->index()->nullable();
            $table->mediumText('observacion')->nullable(); 
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('compras_id')->references('id')->on('compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moneda_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras_dets');
    }
}