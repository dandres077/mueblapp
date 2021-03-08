<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_dets', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('pago_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->date('fecha')->nullable(); // Opcional
            $table->unsignedBigInteger('medio_pago_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('documento_id')->index()->nullable(); // Si es foranea se ingresa el código inferior

            $table->decimal('valor', 2, 1)->nullable(); // Opcional
            $table->unsignedBigInteger('moneda')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->text('observation')->nullable(); // Opcional
            $table->unsignedBigInteger('tercero_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medio_pago_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moneda')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos_dets');
    }
}
