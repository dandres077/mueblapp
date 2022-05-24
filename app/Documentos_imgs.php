<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos_imgs extends Model
{
    protected $fillable = [
        'empresa_id',
        'documento_id',
        'ruta',
        'status',
        'user_create',
        'user_update'
    ];
}


			