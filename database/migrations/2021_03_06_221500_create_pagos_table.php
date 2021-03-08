<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->date('fecha')->nullable(); // Opcional
            $table->unsignedBigInteger('tipo_pago')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('impreso')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->decimal('valor', 2, 1)->nullable(); // Opcional
            $table->string('valorletras')->nullable(); // Opcional
        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_pago')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('impreso')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
