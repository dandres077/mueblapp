<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

            $table->unsignedBigInteger('empresa_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('producto_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->decimal('cantidad', 2, 1)->nullable(); // Opcional
            $table->unsignedBigInteger('almacen_id')->index()->nullable(); // Si es foranea se ingresa el código inferior
            $table->unsignedBigInteger('periodo_id')->index()->nullable(); // Si es foranea se ingresa el código inferior

            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('periodo_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
