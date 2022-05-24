<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento_dets extends Model
{
    protected $fillable = [
        'empresa_id',
        'movimiento_id',
        'fecha',
        'tipo_mov',
        'producto_id',
        'almacen_id',
        'status',
        'user_create',
        'user_update'
    ];
}


			