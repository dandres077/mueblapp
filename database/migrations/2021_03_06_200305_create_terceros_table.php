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
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->unsignedBigInteger('tipo_id')->index()->nullable();         
            $table->string('n_documento')->nullable(); 
            $table->string('nombre1')->nullable(); 
            $table->string('nombre2')->nullable(); 
            $table->string('apellido1')->nullable(); 
            $table->string('apellido2')->nullable(); 
            $table->unsignedBigInteger('tipo_tercero')->index()->nullable(); 
            $table->string('razonsocial')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('celular')->nullable(); 
            $table->string('telefono1')->nullable(); 
            $table->string('telefono2')->nullable(); 
            $table->string('direccion')->nullable(); 
            $table->unsignedBigInteger('ciudad_id')->index()->nullable(); 
            $table->string('sitioweb')->nullable(); 
            $table->string('redsocial1')->nullable(); 
            $table->string('redsocial2')->nullable(); 
            $table->string('redsocial3')->nullable();         
            $table->integer('status')->default(119); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
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
