<?php

use Illuminate\Database\Seeder;
use App\Precios;

class PreciosSeeder extends Seeder
{

    public function run()
    {
        Precios::create([
            'empresa_id' => 1,
            'producto_id' => 1,
            'descripcion' => 'De excelente calidad',
            'pvp' => 1,
            'fechaini' => '2021-01-09',
            'fechafin' => '2021-02-09'
        ]);

        Precios::create([
            'empresa_id' => 1,
            'producto_id' => 2,
            'descripcion' => 'Producto nacional',
            'pvp' => 2,
            'fechaini' => '2020-10-09',
            'fechafin' => '2020-11-09'
        ]);

        Precios::create([
            'empresa_id' => 1,
            'producto_id' => 3,
            'descripcion' => 'Hecha en cedro',
            'pvp' => 3,
            'fechaini' => '2020-11-09',
            'fechafin' => '2020-12-09'
        ]);
    }
}
