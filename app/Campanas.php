<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campanas extends Model
{
    protected $fillable = [
        'empresa_id',
        'nombre',
        'fechaini',
        'fechafin',
        'status',
        'user_create',
        'user_update',
    ];
}

            