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
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
        
            $table->string('nombre')->nullable(); // Opcional
            $table->string('ean')->nullable(); // Opcional
            $table->string('ean13')->nullable(); // Opcional
            $table->decimal('peso', 2, 1)->nullable(); // Opcional
            $table->decimal('largo', 2, 1)->nullable(); // Opcional
            $table->decimal('ancho', 2, 1)->nullable(); // Opcional
            $table->decimal('alto', 2, 1)->nullable(); // Opcional
            $table->decimal('costoestadistico', 2, 1)->nullable(); // Opcional
            $table->string('sku')->nullable(); // Opcional
            $table->unsignedBigInteger('categoria_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('subcategoria_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('tipo_producto')->index()->nullable(); // Si es foranea se ingresa el código inferior
        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
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
