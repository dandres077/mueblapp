<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos_dets extends Model
{
    protected $fillable = [
        'empresa_id',
        'pago_id',
        'fecha',
        'medio_pago_id',
        'documento_id',
        'valor',
        'moneda',
        'observacion',
        'tercero_id',
        'status',
        'user_create',
        'user_update'
    ];
}


			