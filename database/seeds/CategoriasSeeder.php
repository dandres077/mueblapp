<?php

use Illuminate\Database\Seeder;
use App\Categorias;

class CategoriasSeeder extends Seeder
{

    public function run()
    {
        Categorias::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Sala'
        ]);

        Categorias::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Comedor'
        ]);

        Categorias::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Estudio'
        ]);
    }
}
