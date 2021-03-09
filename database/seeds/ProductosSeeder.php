<?php

use Illuminate\Database\Seeder;
use App\Productos;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        Productos::create([
        	'empresa_id' => 1, 
            'nombre' => 'Sofa en L',
            'ean' => '321654',
            'ean13' => '321654',
            'peso' => 1,
            'largo' => 1,
            'ancho' => 1,
            'alto' => 1,
            'costoestadistico' => 1,
            'sku' => 1,
            'categoria_id' => 1,
            'subcategoria_id' => 1,
            'tipo_producto' => 43,
        ]);

        Productos::create([
        	'empresa_id' => 1, 
            'nombre' => 'Comedor 4 puestos',
            'ean' => '987654',
            'ean13' => '987654',
            'peso' => 2,
            'largo' => 2,
            'ancho' => 2,
            'alto' => 2,
            'costoestadistico' => 2,
            'sku' => 2,
            'categoria_id' => 2,
            'subcategoria_id' => 2,
            'tipo_producto' => 44,
        ]);

        Productos::create([
        	'empresa_id' => 1, 
            'nombre' => 'Estudio holandes',
            'ean' => '987321',
            'ean13' => '987321',
            'peso' => 3,
            'largo' => 3,
            'ancho' => 3,
            'alto' => 3,
            'costoestadistico' => 3,
            'sku' => 3,
            'categoria_id' => 3,
            'subcategoria_id' => 3,
            'tipo_producto' => 45,
        ]);
    }
}
