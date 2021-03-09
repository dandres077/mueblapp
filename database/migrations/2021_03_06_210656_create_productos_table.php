<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable();         
            $table->string('nombre')->nullable(); 
            $table->string('ean')->nullable(); 
            $table->string('ean13')->nullable(); 
            $table->decimal('peso', 2, 1)->nullable(); 
            $table->decimal('largo', 2, 1)->nullable(); 
            $table->decimal('ancho', 2, 1)->nullable(); 
            $table->decimal('alto', 2, 1)->nullable(); 
            $table->decimal('costoestadistico', 2, 1)->nullable(); 
            $table->string('sku')->nullable(); 
            $table->unsignedBigInteger('categoria_id')->index()->nullable(); 
            $table->unsignedBigInteger('subcategoria_id')->index()->nullable(); 
            $table->unsignedBigInteger('tipo_producto')->index()->nullable();         
            $table->integer('status')->default(120); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_producto')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
