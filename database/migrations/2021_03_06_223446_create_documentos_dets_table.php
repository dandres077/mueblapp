<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_dets', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->unsignedBigInteger('producto_id')->index()->nullable(); 
            $table->unsignedBigInteger('documento_id')->index()->nullable(); 
            $table->date('fechaent')->nullable(); 
            $table->decimal('cantidad', 2, 1)->nullable(); 
            $table->decimal('costo', 2, 1)->nullable(); 
            $table->decimal('pvp', 2, 1)->nullable(); 
            $table->decimal('impuesto', 2, 1)->nullable(); 
            $table->decimal('retencion', 2, 1)->nullable(); 
            $table->decimal('dcto1', 2, 1)->nullable(); 
            $table->decimal('dcto2', 2, 1)->nullable(); 
            $table->enum('liberado',['Si', 'No'])->default('No'); 
            $table->Integer('pedido')->nullable(); 
            $table->Integer('pedido_det')->nullable(); 
            $table->Integer('oc')->nullable(); 
            $table->Integer('oc_det')->nullable(); 
            $table->Integer('of')->nullable(); 
            $table->Integer('of_det')->nullable(); 
            $table->unsignedBigInteger('moneda')->index()->nullable(); 
            $table->text('observation')->nullable();         
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moneda')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_dets');
    }
}
