<?php

use Illuminate\Database\Seeder;
use App\Almacenes;

class AlmacenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almacenes::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Calle 100'
        ]);

        Almacenes::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Calle 80'
        ]);

        Almacenes::create([
        	'empresa_id' => 1, 
        	'nombre' => 'Restrepo'
        ]);
    }
}
