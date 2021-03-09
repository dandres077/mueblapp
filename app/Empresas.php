<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $fillable = [
    	'nombre',
        'razon_social',
        'tipo_id',
        'n_documento',
        'direccion',
        'telefono',
        'email',
        'sitioweb',
        'ciudad_id',
        'sector_id',
        'imagen',
        'status',
        'user_create',
        'user_update',
    ];
}


            