<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    protected $fillable = [
    	'empresa_id',
        'nombre',
        'direccion',
        'telefono',
        'responsable',
        'horario',
        'status',
        'user_create',
        'user_update',
    ];
}

            