<?php

use Illuminate\Database\Seeder;
use App\Empresas;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::create([
        	'nombre' => 'Ediciones SM',
            'razon_social' => 'Comercializadora SM',
            'tipo_id' => '13',
            'n_documento' => '321654987',
            'direccion' => 'Calle 100',
            'telefono' => '2310449',
            'email' => 'sm@gmail.com',
            'sitioweb' => 'sm.com',
            'ciudad_id' => '6',
            'sector_id' => '10',
            'imagen' => 'https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male-128.png',
            'user_create' => '1',
        ]);

        Empresas::create([
        	'nombre' => 'Santillana',
            'razon_social' => 'Grupo planeta',
            'tipo_id' => '13',
            'n_documento' => '642135123',
            'direccion' => 'Calle 26',
            'telefono' => '2310589',
            'email' => 'santillana@gmail.com',
            'sitioweb' => 'ssntillana.com',
            'ciudad_id' => '6',
            'sector_id' => '10',
            'imagen' => 'https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male-128.png',
            'user_create' => '1',
        ]);

    }
}
