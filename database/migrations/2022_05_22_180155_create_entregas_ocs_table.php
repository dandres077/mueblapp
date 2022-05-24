<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasOcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas_ocs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->index()->nullable();
            $table->unsignedBigInteger('ubicacion_id')->index()->nullable();
            $table->unsignedBigInteger('tipo_doc')->index()->nullable();
            $table->unsignedBigInteger('no_documento')->nullable(); 
            $table->date('fecha')->nullable(); 
            $table->unsignedBigInteger('proveedor_id')->index()->nullable();
            $table->decimal('valor', 10, 1)->nullable(); 
            $table->decimal('impuesto', 10, 1)->nullable(); 
            $table->decimal('retencion', 10, 1)->nullable(); 
            $table->mediumText('observacion')->nullable(); 
            $table->unsignedBigInteger('impreso_id')->index()->nullable();
            $table->enum('liberado',['Si', 'No'])->default('No');
            $table->date('fechaent')->nullable(); 
            $table->decimal('dcto1', 10, 1)->nullable(); 
            $table->decimal('dcto2', 10, 1)->nullable(); 
            $table->unsignedBigInteger('moneda_id')->index()->nullable();
            $table->integer('status')->default(1);
            $table->integer('user_create')->nullable();
            $table->integer('user_update')->nullable();
            $table->timestamps();


            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('impreso_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moneda_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_doc')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas_ocs');
    }
}
