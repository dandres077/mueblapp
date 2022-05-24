<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_dets', function (Blueprint $table) {
            $table->id('id'); 
            $table->unsignedBigInteger('empresa_id')->index()->nullable(); 
            $table->unsignedBigInteger('pago_id')->index()->nullable(); 
            $table->date('fecha')->nullable(); 
            $table->unsignedBigInteger('medio_pago_id')->index()->nullable(); 
            $table->unsignedBigInteger('documento_id')->index()->nullable(); 
            $table->decimal('valor', 2, 1)->nullable(); 
            $table->unsignedBigInteger('moneda')->index()->nullable(); 
            $table->text('observation')->nullable(); 
            $table->unsignedBigInteger('tercero_id')->index()->nullable(); 
            $table->integer('status')->default(1); 
            $table->integer('user_create')->nullable(); 
            $table->integer('user_update')->nullable(); 
            $table->timestamps(); 
        
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medio_pago_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moneda')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos_dets');
    }
}
