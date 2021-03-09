<?php

use Illuminate\Database\Seeder;
use App\Tiendas;

class TiendasSeeder extends Seeder
{
    public function run()
    {
        Tiendas::create([
            'empresa_id' => 1,
            'nombre' => 'Bodega 1',
            'direccion' => 'Calle 100 52-96',
            'telefono' => '0572310449',
            'responsable' => 'Jorgue Alfredo Vargas',
            'horario' => 'Lunes a Viernes 8am - 6pm'
        ]);

        Tiendas::create([
            'empresa_id' => 1,
            'nombre' => 'Bodega 2',
            'direccion' => 'Calle 80 78-96',
            'telefono' => '0572310449',
            'responsable' => 'Camilo Briceño',
            'horario' => 'Lunes a Viernes 8am - 6pm'
        ]);

        Tiendas::create([
            'empresa_id' => 1,
            'nombre' => 'Bodega 3',
            'direccion' => 'Calle 1 10-85',
            'telefono' => '0572358968',
            'responsable' => 'Esteban Hernandez',
            'horario' => 'Lunes a Viernes 8am - 6pm'
        ]);
    }
}


            