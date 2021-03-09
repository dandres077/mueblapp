<?php

use Illuminate\Database\Seeder;
use App\Subcategorias;

class SubcategoriasSeeder extends Seeder
{
    public function run()
    {
        Subcategorias::create([
        	'empresa_id' => 1, 
            'categoria_id' => 1,
        	'nombre' => 'Sofas'
        ]);

        Subcategorias::create([
        	'empresa_id' => 1, 
            'categoria_id' => 2,
        	'nombre' => 'Mesa de comedor'
        ]);

        Subcategorias::create([
        	'empresa_id' => 1, 
            'categoria_id' => 3,
        	'nombre' => 'Escritorios'
        ]);
    }
}
