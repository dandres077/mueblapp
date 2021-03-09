<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    protected $fillable = [
        'empresa_id',
        'categoria_id',
        'nombre', 
        'status', 
        'user_create', 
        'user_update'
    ];
}
