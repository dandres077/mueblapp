<?php

use Illuminate\Database\Seeder;
use App\Vendedores;

class VendedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendedores::create([
            'empresa_id' => 1,
            'nombre' => 'Andrés Felipe',
            'apellido' => 'Carvajal Pineda'
        ]);

        Vendedores::create([
            'empresa_id' => 1,
            'nombre' => 'Felipe',
            'apellido' => 'Castro Gomez'
        ]);

        Vendedores::create([
            'empresa_id' => 1,
            'nombre' => 'Camila',
            'apellido' => 'López Pineda'
        ]);
    }
}
