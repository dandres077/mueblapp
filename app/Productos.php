<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'empresa_id',
        'nombre',
        'ean',
        'ean13',
        'peso',
        'largo',
        'ancho',
        'alto',
        'costoestadistico',
        'sku',
        'categoria_id',
        'subcategoria_id',
        'tipo_producto',
        'status',
        'user_create',
        'user_update'
    ];
}

            