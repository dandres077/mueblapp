<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'David', 
        	'last' => 'Contreras', 
        	'email' => 'da.contrerasp@uniandes.edu.co', 
        	'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Andres', 
            'last' => 'Contreras', 
            'email' => 'davidcontreras07@gmail.com', 
            'password' => bcrypt('123456')
        ]);

    }
}
