<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trigger1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
            USE mueblapp;

            DELIMITER $$

            USE mueblapp$$
            DROP TRIGGER IF EXISTS mueblapp.`compras_AFTER_INSERT` $$
            DELIMITER ;
            DROP TRIGGER IF EXISTS mueblapp.`compras_AFTER_UPDATE`;

            DELIMITER $$
            USE mueblapp$$
            CREATE DEFINER=`root`@`localhost` TRIGGER `compras_AFTER_UPDATE` AFTER UPDATE ON `compras` FOR EACH ROW BEGIN
            DECLARE `_consecutivo_id` bigint unsigned;
            DECLARE `_tipo_doc` bigint unsigned;
            DECLARE `_no_doc` bigint unsigned;

            SET _tipo_doc := (SELECT id FROM catalogos WHERE nombre = 13 and opcion = "Entrega Orden de Compra" LIMIT 1);
            SET _no_doc := ( SELECT numero FROM consecutivos WHERE empresa_id = new.empresa_id and ubicacion_id = new.ubicacion_id and tipo_doc_id = _tipo_doc LIMIT 1 );

            IF new.liberado = "Si" -- Valida si el pedido fue liberado.
             THEN 
             INSERT INTO mueblapp.`entregas_oc`
            (`empresa_id`,`ubicacion_id`,`tipo_doc`,`no_documento`,`fecha`,
            `proveedor_id`,`valor`,`impuesto`,`retencion`,`observation`,`impreso`,
            `liberado`,`fechaent`,`dcto1`,`dcto2`,`moneda`,`status`,`user_create`,`created_at`,`documento_pre`)
            VALUES
            (new.empresa_id,new.ubicacion_id, _tipo_doc, _no_doc, sysdate(),
            new.proveedor_id,new.valor,new.impuesto,new.retencion,new.observation, 75, -- Por defecto No (75)
            "No", new.fechaent,new.dcto1,new.dcto2,new.moneda,1,new.user_update,sysdate(),new.no_documento);

            SET _consecutivo_id := (SELECT id FROM consecutivos WHERE empresa_id = new.empresa_id and 
                    ubicacion_id = 4 and 
                    tipo_doc_id = _tipo_doc
                    LIMIT 1);
            update consecutivos set numero = numero + 1 where id = _consecutivo_id;

            end if;
            END$$
            DELIMITER ;
        
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
