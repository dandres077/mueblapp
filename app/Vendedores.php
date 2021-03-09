<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    protected $fillable = [
    	'empresa_id',
        'nombre',
        'apellido',
        'status',
        'user_create',
        'user_update',
    ];
}

