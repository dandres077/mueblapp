<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha_ents extends Model
{
    protected $fillable = [
        'empresa_id',
        'fecha',
        'dias',
        'status',
        'user_create',
        'user_update'
    ];
}


			