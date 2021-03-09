<?php

use Illuminate\Database\Seeder;
use App\Campanas;

class CampanasSeeder extends Seeder
{
    public function run()
    {
        Campanas::create([
        	'empresa_id' => 1,
            'nombre' => 'Navidad',
            'fechaini' => '2021-12-01',
            'fechafin' => '2021-12-31',
        ]);

        Campanas::create([
        	'empresa_id' => 1,
            'nombre' => 'Amor y Amistad',
            'fechaini' => '2021-09-01',
            'fechafin' => '2021-09-30',
        ]);

        Campanas::create([
        	'empresa_id' => 1,
            'nombre' => 'Vacaciones',
            'fechaini' => '2021-06-01',
            'fechafin' => '2021-06-30',
        ]);
    }
}
