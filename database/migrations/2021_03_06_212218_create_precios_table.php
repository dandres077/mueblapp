<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->unsignedBigInteger('producto_id')->index()->nullable();         
            $table->string('descripcion')->nullable(); 
            $table->decimal('pvp', 2, 1)->nullable(); 
            $table->date('fechaini')->nullable(); 
            $table->date('fechafin')->nullable();         
            $table->integer('status')->default(122); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
