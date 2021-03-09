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
            $table->id('id'); 
            $table->string('nombre')->nullable(); 
            $table->string('razon_social')->nullable(); 
            $table->unsignedBigInteger('tipo_id')->index()->nullable(); 
            $table->string('n_documento')->nullable(); 
            $table->string('direccion')->nullable(); 
            $table->string('telefono')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('sitioweb')->nullable(); 
            $table->unsignedBigInteger('ciudad_id')->index()->nullable(); 
            $table->unsignedBigInteger('sector_id')->index()->nullable(); 
            $table->text('imagen')->nullable();
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 

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
