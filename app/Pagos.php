<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $fillable = [
        'empresa_id',
        'fecha',
        'tipo_pago',
        'impreso',
        'valor',
        'valorletras',        
        'status',
        'user_create',
        'user_update'
    ];
}


			