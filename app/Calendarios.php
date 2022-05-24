<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendarios extends Model
{
    protected $fillable = [
        'fecha',
        'ano',
        'mes',
        'esfuerzo_dia',
        'dia_habil',
        'nombre_dia',
        'semana',
        'semanames',
        'status',
        'user_create',
        'user_update'
    ];
}


			