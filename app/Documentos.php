<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $fillable = [
        'empresa_id',
        'fecha',
        'tipo_doc',
        'tercero_id',
        'valor',
        'impuesto',
        'retencion',
        'observation',
        'impreso',
        'liberado',
        'fechaent',
        'dcto1',
        'dcto2',
        'subtotal',
        'contacto_id',
        'ubicacion_id',        
        'status',
        'user_create',
        'user_update'
    ];
}


			