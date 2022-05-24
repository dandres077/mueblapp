<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->date('fecha')->nullable(); 
            $table->unsignedBigInteger('tipo_doc')->index()->nullable(); 
            $table->unsignedBigInteger('tercero_id')->index()->nullable(); 
            $table->decimal('valor', 2, 1)->nullable(); 
            $table->decimal('impuesto', 2, 1)->nullable(); 
            $table->decimal('retencion', 2, 1)->nullable(); 
            $table->text('observation')->nullable(); 
            $table->unsignedBigInteger('impreso')->index()->nullable(); 
            $table->enum('liberado',['Si', 'No'])->default('No'); 
            $table->date('fechaent')->nullable(); 
            $table->decimal('dcto1', 2, 1)->nullable(); 
            $table->decimal('dcto2', 2, 1)->nullable(); 
            $table->decimal('subtotal', 2, 1)->nullable(); 
            $table->unsignedBigInteger('contacto_id')->index()->nullable();
            $table->integer('ubicacion_id')->nullable();         
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_doc')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('impreso')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contacto_id')->references('id')->on('terceros')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
