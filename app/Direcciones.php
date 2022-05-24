<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $fillable = [
        'empresa_id',
        'ciudad_id',
        'tercero_id',
        'tipo_tercero_id',
        'contacto_id',
        'dir1',
        'dir2',
        'dir3',
        'dir4',
        'dir5',
        'dir6',
        'dir7',
        'dir8',
        'dir9',
        'dir10',
        'dir11',
        'dir12',
        'dir13',
        'barrio',
        'localidad',
        'status',
        'user_create',
        'user_update'
    ];
}


			