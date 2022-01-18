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
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->date('fecha')->nullable(); // Opcional
            $table->unsignedBigInteger('tipo_doc')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('tercero_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->decimal('valor', 2, 1)->nullable(); // Opcional
            $table->decimal('impuesto', 2, 1)->nullable(); // Opcional
            $table->decimal('retencion', 2, 1)->nullable(); // Opcional
            $table->text('observation')->nullable(); // Opcional
            $table->unsignedBigInteger('impreso')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->enum('liberado',['Si', 'No'])->default('No'); // Opcional
            $table->date('fechaent')->nullable(); // Opcional
            $table->decimal('dcto1', 2, 1)->nullable(); // Opcional
            $table->decimal('dcto2', 2, 1)->nullable(); // Opcional
            $table->decimal('subtotal', 2, 1)->nullable(); // Opcional
            $table->unsignedBigInteger('contacto_id')->index()->nullable();
            $table->integer('ubicacion_id')->nullable(); // Opcional

        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
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
