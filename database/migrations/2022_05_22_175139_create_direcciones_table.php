<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->index()->nullable();
            $table->unsignedBigInteger('ciudad_id')->index()->nullable();
            $table->unsignedBigInteger('tercero_id')->index()->nullable();
            $table->unsignedBigInteger('tipo_tercero_id')->index()->nullable();
            $table->unsignedBigInteger('contacto_id')->index()->nullable();
            $table->string('dir1')->nullable();
            $table->string('dir2')->nullable();
            $table->string('dir3')->nullable();
            $table->string('dir4')->nullable();
            $table->string('dir5')->nullable();
            $table->string('dir6')->nullable();
            $table->string('dir7')->nullable();
            $table->string('dir8')->nullable();
            $table->string('dir9')->nullable();
            $table->string('dir10')->nullable();
            $table->string('dir11')->nullable();
            $table->string('dir12')->nullable();
            $table->string('dir13')->nullable();
            $table->string('barrio')->nullable();
            $table->string('localidad')->nullable();
            $table->integer('status')->default(37); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_tercero_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}




  
