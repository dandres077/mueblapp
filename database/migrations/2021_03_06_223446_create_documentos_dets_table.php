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
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('producto_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('documento_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->date('fechaent')->nullable(); // Opcional
            $table->decimal('cantidad', 2, 1)->nullable(); // Opcional
            $table->decimal('costo', 2, 1)->nullable(); // Opcional
            $table->decimal('pvp', 2, 1)->nullable(); // Opcional
            $table->decimal('impuesto', 2, 1)->nullable(); // Opcional
            $table->decimal('retencion', 2, 1)->nullable(); // Opcional
            $table->decimal('dcto1', 2, 1)->nullable(); // Opcional
            $table->decimal('dcto2', 2, 1)->nullable(); // Opcional
            $table->enum('liberado',['Si', 'No'])->default('No'); // Opcional
            $table->Integer('pedido')->nullable(); // Opcional
            $table->Integer('pedido_det')->nullable(); // Opcional
            $table->Integer('oc')->nullable(); // Opcional
            $table->Integer('oc_det')->nullable(); // Opcional
            $table->Integer('of')->nullable(); // Opcional
            $table->Integer('of_det')->nullable(); // Opcional
            $table->unsignedBigInteger('moneda')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->text('observation')->nullable(); // Opcional
        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
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
