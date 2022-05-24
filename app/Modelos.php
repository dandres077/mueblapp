<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $fillable = [
        'marca_id',
        'nombre',
        'status',
        'user_create',
        'user_update'
    ];
}


			