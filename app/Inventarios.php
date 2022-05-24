<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
    protected $fillable = [
        'empresa_id',
        'producto_id',
        'cantidad',
        'almacen_id',
        'periodo_id',
        'status',
        'user_create',
        'user_update'
    ];
}


			