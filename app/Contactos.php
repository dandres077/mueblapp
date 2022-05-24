<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $fillable = [
        'empresa_id',
        'tercero_id',
        'tipo_tercero_id',
        'nombre',
        'status',
        'user_create',
        'user_update'
    ];
}


			