<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'permiso:roles.store']); 
		Permission::create(['name' => 'permiso:roles.index']); 
		Permission::create(['name' => 'permiso:roles.create']);  
		Permission::create(['name' => 'permiso:roles.update']); 
		Permission::create(['name' => 'permiso:roles.show']);  
		Permission::create(['name' => 'permiso:roles.destroy']); 
		Permission::create(['name' => 'permiso:roles.edit']); 
		Permission::create(['name' => 'permiso:permisos.store']); 
		Permission::create(['name' => 'permiso:permisos.index']); 
		Permission::create(['name' => 'permiso:permisos.create']);  
		Permission::create(['name' => 'permiso:permisos.edit']); 
		Permission::create(['name' => 'permiso:permisos.show']);  
		Permission::create(['name' => 'permiso:permisos.destroy']); 
		Permission::create(['name' => 'permiso:usuarios.store']);  
		Permission::create(['name' => 'permiso:usuarios.index']); 
		Permission::create(['name' => 'permiso:usuarios.create']);
		Permission::create(['name' => 'permiso:usuarios.update']); 
		Permission::create(['name' => 'permiso:usuarios.show']);
		Permission::create(['name' => 'permiso:usuarios.destroy']); 
		Permission::create(['name' => 'permiso:usuarios.edit']);
		Permission::create(['name' => 'permiso:usuarios.active']); 
		Permission::create(['name' => 'permiso:usuarios.inactive']);
		Permission::create(['name' => 'permiso:usuarios.editarperfil']); 
		Permission::create(['name' => 'permiso:usuarios.updateperfil']); 
		Permission::create(['name' => 'permiso:paises.store']);
		Permission::create(['name' => 'permiso:paises.index']);
		Permission::create(['name' => 'permiso:paises.create']);
		Permission::create(['name' => 'permiso:paises.update']);
		Permission::create(['name' => 'permiso:paises.show']);
		Permission::create(['name' => 'permiso:paises.destroy']);
		Permission::create(['name' => 'permiso:paises.edit']);
		Permission::create(['name' => 'permiso:paises.active']);
		Permission::create(['name' => 'permiso:paises.inactive']);
		Permission::create(['name' => 'permiso:departamentos.store']); 
		Permission::create(['name' => 'permiso:departamentos.index']); 
		Permission::create(['name' => 'permiso:departamentos.create']); 
		Permission::create(['name' => 'permiso:departamentos.update']); 
		Permission::create(['name' => 'permiso:departamentos.show']); 
		Permission::create(['name' => 'permiso:departamentos.destroy']); 
		Permission::create(['name' => 'permiso:departamentos.edit']); 
		Permission::create(['name' => 'permiso:departamentos.active']); 
		Permission::create(['name' => 'permiso:departamentos.inactive']); 
		Permission::create(['name' => 'permiso:ciudades.store']); 
		Permission::create(['name' => 'permiso:ciudades.index']); 
		Permission::create(['name' => 'permiso:ciudades.create']); 
		Permission::create(['name' => 'permiso:ciudades.update']); 
		Permission::create(['name' => 'permiso:ciudades.show']); 
		Permission::create(['name' => 'permiso:ciudades.destroy']); 
		Permission::create(['name' => 'permiso:ciudades.edit']); 
		Permission::create(['name' => 'permiso:ciudades.active']); 
		Permission::create(['name' => 'permiso:ciudades.inactive']); 
		Permission::create(['name' => 'permiso:catalogos.store']); 
		Permission::create(['name' => 'permiso:catalogos.index']); 
		Permission::create(['name' => 'permiso:catalogos.create']); 
		Permission::create(['name' => 'permiso:catalogos.update']); 
		Permission::create(['name' => 'permiso:catalogos.show']); 
		Permission::create(['name' => 'permiso:catalogos.destroy']); 
		Permission::create(['name' => 'permiso:catalogos.edit']); 
		Permission::create(['name' => 'permiso:catalogos.active']); 
		Permission::create(['name' => 'permiso:catalogos.inactive']); 
		

        // create roles and assign created permissions


        // or may be done by chaining
        /*$role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);*/

        $role = Role::create(['name' => 'SuperAdministrador']);
        $role->givePermissionTo(Permission::all());

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 2
        ]);
    }
}