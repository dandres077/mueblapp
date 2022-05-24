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
            $table->id('id'); 
            $table->date('fecha')->nullable(); 
            $table->integer('ano')->nullable(); 
            $table->integer('mes')->nullable(); 
            $table->decimal('esfuerzo_dia', 2, 1)->nullable(); 
            $table->enum('dia_habil',['Si', 'No'])->default('No'); 
            $table->string('nombre_dia')->nullable(); 
            $table->integer('semana')->nullable(); 
            $table->integer('semanames')->nullable(); 
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
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
