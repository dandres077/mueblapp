<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $fillable = [
        'empresa_id',
        'tipo_id',
        'n_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'tipo_tercero',
        'razonsocial',
        'email',
        'celular',
        'telefono1',
        'telefono2',
        'direccion',
        'ciudad_id',
        'sitioweb',
        'redsocial1',
        'redsocial2',
        'redsocial3',
        'status',
        'user_create',
        'user_update'
    ];
}


			