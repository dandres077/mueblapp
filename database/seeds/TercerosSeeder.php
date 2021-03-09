<?php

use Illuminate\Database\Seeder;
use App\Terceros;

class TercerosSeeder extends Seeder
{

    public function run()
    {
        Terceros::create([
            'empresa_id' => 1,
            'tipo_id' => 13,
            'n_documento' => '23789',
            'nombre1' => 'Camilo',
            'nombre2' => 'Andrés',
            'apellido1' => 'Fajardo',
            'apellido2' => 'Lopez',
            'tipo_tercero' => 34,
            'razonsocial' => 'Grupo Exito',
            'email' => 'exito@gmail.com',
            'celular' => '3115896987',
            'telefono1' => '2310449',
            'telefono2' => '2406967',
            'direccion' => 'Calle 72A 59-96',
            'ciudad_id' => '7',
            'sitioweb' => 'https://pulzo.com',
            'redsocial1' => '#',
            'redsocial2' => '#',
            'redsocial3' => '#',
        ]);

        Terceros::create([
            'empresa_id' => 1,
            'tipo_id' => 13,
            'n_documento' => '23789',
            'nombre1' => 'Viviana',
            'nombre2' => '',
            'apellido1' => 'Nova',
            'apellido2' => 'Lopez',
            'tipo_tercero' => 35,
            'razonsocial' => 'Falabella',
            'email' => 'faleblla@gmail.com',
            'celular' => '3135236968',
            'telefono1' => '2310449',
            'telefono2' => '2406967',
            'direccion' => 'Calle 10 59-96',
            'ciudad_id' => '9',
            'sitioweb' => 'https://faleblla.com',
            'redsocial1' => '#',
            'redsocial2' => '#',
            'redsocial3' => '#',
        ]);

        Terceros::create([
            'empresa_id' => 1,
            'tipo_id' => 13,
            'n_documento' => '23789',
            'nombre1' => 'David',
            'nombre2' => 'Andrés',
            'apellido1' => 'Guevera',
            'apellido2' => 'Gomez',
            'tipo_tercero' => 36,
            'razonsocial' => 'Homecenter',
            'email' => 'home@gmail.com',
            'celular' => '3189687845',
            'telefono1' => '2310449',
            'telefono2' => '2406967',
            'direccion' => 'Calle 100 59-96',
            'ciudad_id' => '10',
            'sitioweb' => 'https://homecenter.com',
            'redsocial1' => '#',
            'redsocial2' => '#',
            'redsocial3' => '#',
        ]);
    }
}
