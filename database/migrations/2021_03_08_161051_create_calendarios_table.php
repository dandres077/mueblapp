<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id('id'); // Obligatorio

            $table->date('fecha')->nullable(); // Opcional
            $table->integer('ano')->nullable(); // Opcional
            $table->integer('mes')->nullable(); // Opcional
            $table->decimal('esfuerzo_dia', 2, 1)->nullable(); // Opcional
            $table->enum('dia_habil',['Si', 'No'])->default('No'); // Opcional
            $table->string('nombre_dia')->nullable(); // Opcional
            $table->integer('semana')->nullable(); // Opcional
            $table->integer('semanames')->nullable(); // Opcional

            $table->integer('status')->default(1); //Obligatorio
            $table->integer('user_create')->nullable(); //Obligatorio
            $table->integer('user_update')->nullable(); //Obligatorio
            $table->timestamps(); //Obligatorio
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendarios');
    }
}
