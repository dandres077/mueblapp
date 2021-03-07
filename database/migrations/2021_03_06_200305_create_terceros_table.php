<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('tipo_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
        
            $table->string('n_documento')->nullable(); // Opcional
            $table->string('nombre1')->nullable(); // Opcional
            $table->string('nomnbre2')->nullable(); // Opcional
            $table->string('apellido1')->nullable(); // Opcional
            $table->string('apellido2')->nullable(); // Opcional
            $table->unsignedBigInteger('tipo_tercero')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->string('razonsocial')->nullable(); // Opcional
            $table->string('email')->nullable(); // Opcional
            $table->string('celular')->nullable(); // Opcional
            $table->string('telefono1')->nullable(); // Opcional
            $table->string('telefono2')->nullable(); // Opcional
            $table->string('direccion')->nullable(); // Opcional
            $table->unsignedBigInteger('ciudad_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->string('sitioweb')->nullable(); // Opcional
            $table->string('redsocial1')->nullable(); // Opcional
            $table->string('redsocial2')->nullable(); // Opcional
            $table->string('redsocial3')->nullable(); // Opcional
        
            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_tercero')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade');
        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terceros');
    }
}
