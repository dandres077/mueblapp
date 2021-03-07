<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

           
            $table->string('nombre')->nullable(); // Opcional
            $table->string('razon_social')->nullable(); // Opcional
            $table->unsignedBigInteger('tipo_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->string('n_documento')->nullable(); // Opcional
            $table->string('direccion')->nullable(); // Opcional
            $table->string('telefono')->nullable(); // Opcional
            $table->string('email')->nullable(); // Opcional
            $table->string('sitioweb')->nullable(); // Opcional
            $table->unsignedBigInteger('ciudad_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('sector_id')->index()->nullable(); // Si es foranea se ingresa el código inferior

        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio

            $table->foreign('tipo_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sector_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
