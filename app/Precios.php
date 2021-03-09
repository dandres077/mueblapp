<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    protected $fillable = [
        'empresa_id',
        'producto_id',
        'descripcion',
        'pvp',
        'fechaini',
        'fechafin',
        'status',
        'user_create',
        'user_update'
    ];
}

            