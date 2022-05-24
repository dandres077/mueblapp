<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    protected $fillable = [
        'empresa_id',
        'fecha',
        'tipo_mov',
        'status',
        'user_create',
        'user_update'
    ];
}


			