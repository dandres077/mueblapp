<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
    protected $fillable = [
    	'empresa_id',
        'nombre',
        'status',
        'user_create',
        'user_update',
    ];
}

            