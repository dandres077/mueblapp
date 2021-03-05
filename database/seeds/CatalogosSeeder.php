<?php

use Illuminate\Database\Seeder;
use App\Catalogos;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        Catalogos::create(['nombre' => '1','opcion' => 'RUT']);//1

        Catalogos::create(['nombre' => '2','opcion' => 'Cédula de Ciudadanía']);//2
        Catalogos::create(['nombre' => '2','opcion' => 'Tarjeta de Identidad']);
        Catalogos::create(['nombre' => '2','opcion' => 'Cedula de Extranjería']);
        Catalogos::create(['nombre' => '2','opcion' => 'Registro Civil']);
        Catalogos::create(['nombre' => '2','opcion' => 'Numero de Identificación Personal (NIP)']);
        Catalogos::create(['nombre' => '2','opcion' => 'Número Unico de Identificación Personal (NUIP)']);
        Catalogos::create(['nombre' => '2','opcion' => 'NES']);
        Catalogos::create(['nombre' => '2','opcion' => 'Certificado de Cabildo']);
        Catalogos::create(['nombre' => '2','opcion' => 'Pasaporte']);
        Catalogos::create(['nombre' => '2','opcion' => 'Permiso Especial de Residencia (PEP)']);//11
       
        Catalogos::create(['nombre' => '3','opcion' => 'Efectivo']);//12
        Catalogos::create(['nombre' => '3','opcion' => 'Tarjeta Débito']);//6
        Catalogos::create(['nombre' => '3','opcion' => 'Tarjeta Crédito']);//7
        Catalogos::create(['nombre' => '3','opcion' => 'Transferencia']);//8
        Catalogos::create(['nombre' => '3','opcion' => 'Cheque']);//16

        Catalogos::create(['nombre' => '4','opcion' => 'Mujer']);//17
        Catalogos::create(['nombre' => '4','opcion' => 'Hombre']);//11
        Catalogos::create(['nombre' => '4','opcion' => 'Otro']);//19

        Catalogos::create(['nombre' => '5','opcion' => 'A']);//20
        Catalogos::create(['nombre' => '5','opcion' => 'B']);//21
        
        Catalogos::create(['nombre' => '6','opcion' => 'Oficial']);//22
        Catalogos::create(['nombre' => '6','opcion' => 'No oficial']);//23

        Catalogos::create(['nombre' => '7','opcion' => 'Masculino']);//24
        Catalogos::create(['nombre' => '7','opcion' => 'Femenino']);//25
        Catalogos::create(['nombre' => '7','opcion' => 'Mixto']);//26

        Catalogos::create(['nombre' => '8','opcion' => 'Mañana']);//27
        Catalogos::create(['nombre' => '8','opcion' => 'Tarde']);//28
        Catalogos::create(['nombre' => '8','opcion' => 'Completa']);//29

        Catalogos::create(['nombre' => '9','opcion' => '0']);//36
        Catalogos::create(['nombre' => '9','opcion' => '1']);//30
        Catalogos::create(['nombre' => '9','opcion' => '2']);//31
        Catalogos::create(['nombre' => '9','opcion' => '3']);//32
        Catalogos::create(['nombre' => '9','opcion' => '4']);//33
        Catalogos::create(['nombre' => '9','opcion' => '5']);//34
        Catalogos::create(['nombre' => '9','opcion' => '6']);//35
        Catalogos::create(['nombre' => '9','opcion' => 'No aplica']);//43

        Catalogos::create(['nombre' => '10','opcion' => 'Urbana']);//17
        Catalogos::create(['nombre' => '10','opcion' => 'Rural']);//18
        Catalogos::create(['nombre' => '10','opcion' => 'Urbana y Rural']);//46

        Catalogos::create(['nombre' => '11','opcion' => 'Padre']);//17
        Catalogos::create(['nombre' => '11','opcion' => 'Madre']);//48

        Catalogos::create(['nombre' => '12','opcion' => 'O+']);
        Catalogos::create(['nombre' => '12','opcion' => 'O-']);
        Catalogos::create(['nombre' => '12','opcion' => 'A+']);
        Catalogos::create(['nombre' => '12','opcion' => 'A-']);
        Catalogos::create(['nombre' => '12','opcion' => 'B+']);
        Catalogos::create(['nombre' => '12','opcion' => 'B-']);
        Catalogos::create(['nombre' => '12','opcion' => 'AB+']);
        Catalogos::create(['nombre' => '12','opcion' => 'AB-']);//56

        Catalogos::create(['nombre' => '13','opcion' => 'Propia']);
        Catalogos::create(['nombre' => '13','opcion' => 'Arrendada']);
        Catalogos::create(['nombre' => '13','opcion' => 'Familiar']);//59

        Catalogos::create(['nombre' => '14','opcion' => 'Zona norte']);
        Catalogos::create(['nombre' => '14','opcion' => 'Zon sur']);
        Catalogos::create(['nombre' => '14','opcion' => 'Zona oriente']);
        Catalogos::create(['nombre' => '14','opcion' => 'Zona occidente']);//63

        Catalogos::create(['nombre' => '15','opcion' => 'Soltero(a)']);
        Catalogos::create(['nombre' => '15','opcion' => 'Casado(a)']);
        Catalogos::create(['nombre' => '15','opcion' => 'Divorciado(a)']);
        Catalogos::create(['nombre' => '15','opcion' => 'Separación en proceso judicial']);
        Catalogos::create(['nombre' => '15','opcion' => 'Viudo(a)']);
        Catalogos::create(['nombre' => '15','opcion' => 'Unión libre']);

    }
}




