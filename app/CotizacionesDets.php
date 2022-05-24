<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionesDets extends Model
{
    protected $fillable = [
        'empresa_id',
        'producto_id',
        'cotizacion_id',
        'fechaent',
        'cantidad',
        'costo',
        'pvp',
        'impuesto',
        'retencion',
        'dcto1',
        'dcto2',
        'liberado',
        'documento_pre',
        'documento_pre_det',
        'moneda_id',
        'observacion',
        'status',
        'user_create',
        'user_update'
    ];
}


			