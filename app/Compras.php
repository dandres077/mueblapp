<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $fillable = [
        'empresa_id',
        'ubicacion_id',
        'tipo_doc',
        'no_documento',
        'fecha',
        'proveedor_id',
        'valor',
        'impuesto',
        'retencion',
        'observasion',
        'impreso_id',
        'liberado',
        'fechaent',
        'dcto1',
        'dcto2',
        'moneda_id',
        'status',
        'user_create',
        'user_update'
    ];
}


			