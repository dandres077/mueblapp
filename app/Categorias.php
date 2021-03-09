<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'empresa_id',
        'nombre', 
        'status', 
        'user_create', 
        'user_update'
    ];
}
