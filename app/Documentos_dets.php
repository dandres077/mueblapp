<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos_dets extends Model
{
    protected $fillable = [
        'empresa_id',
        'producto_id',
        'documento_id',
        'fechaent',
        'cantidad',
        'costo',
        'pvp',
        'impuesto',
        'retencion',
        'dcto1',
        'dcto2',
        'liberado',
        'pedido',
        'pedido_det',
        'oc',
        'oc_det',
        'of',
        'of_det',
        'moneda',
        'observation',        
        'status',
        'user_create',
        'user_update'
    ];
}


			