<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consecutivos extends Model
{
    protected $fillable = [
        'empresa_id',
        'ubicacion_id',
        'tipo_doc_id',
        'numero',
        'nombre',
        'status',
        'user_create',
        'user_update'
    ];
}


			