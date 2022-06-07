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
        Permission::create(['name' => 'roles.store']); 
		Permission::create(['name' => 'roles.index']); 
		Permission::create(['name' => 'roles.create']);  
		Permission::create(['name' => 'roles.update']); 
		Permission::create(['name' => 'roles.show']);  
		Permission::create(['name' => 'roles.destroy']); 
		Permission::create(['name' => 'roles.edit']); 
		Permission::create(['name' => 'roles.active']); 
		Permission::create(['name' => 'roles.inactive']); 
		Permission::create(['name' => 'permisos.store']); 
		Permission::create(['name' => 'permisos.index']); 
		Permission::create(['name' => 'permisos.create']);  
		Permission::create(['name' => 'permisos.edit']); 
		Permission::create(['name' => 'permisos.show']);  
		Permission::create(['name' => 'permisos.destroy']); 
		Permission::create(['name' => 'usuarios.store']);  
		Permission::create(['name' => 'usuarios.index']); 
		Permission::create(['name' => 'usuarios.create']);
		Permission::create(['name' => 'usuarios.update']); 
		Permission::create(['name' => 'usuarios.show']);
		Permission::create(['name' => 'usuarios.destroy']); 
		Permission::create(['name' => 'usuarios.edit']);
		Permission::create(['name' => 'usuarios.active']); 
		Permission::create(['name' => 'usuarios.inactive']);
		Permission::create(['name' => 'usuarios.editarperfil']); 
		Permission::create(['name' => 'usuarios.updateperfil']); 
		Permission::create(['name' => 'usuarios.pwd']); 
		Permission::create(['name' => 'paises.store']);
		Permission::create(['name' => 'paises.index']);
		Permission::create(['name' => 'paises.create']);
		Permission::create(['name' => 'paises.update']);
		Permission::create(['name' => 'paises.show']);
		Permission::create(['name' => 'paises.destroy']);
		Permission::create(['name' => 'paises.edit']);
		Permission::create(['name' => 'paises.active']);
		Permission::create(['name' => 'paises.inactive']);
		Permission::create(['name' => 'departamentos.store']); 
		Permission::create(['name' => 'departamentos.index']); 
		Permission::create(['name' => 'departamentos.create']); 
		Permission::create(['name' => 'departamentos.update']); 
		Permission::create(['name' => 'departamentos.show']); 
		Permission::create(['name' => 'departamentos.destroy']); 
		Permission::create(['name' => 'departamentos.edit']); 
		Permission::create(['name' => 'departamentos.active']); 
		Permission::create(['name' => 'departamentos.inactive']); 
		Permission::create(['name' => 'ciudades.store']); 
		Permission::create(['name' => 'ciudades.index']); 
		Permission::create(['name' => 'ciudades.create']); 
		Permission::create(['name' => 'ciudades.update']); 
		Permission::create(['name' => 'ciudades.show']); 
		Permission::create(['name' => 'ciudades.destroy']); 
		Permission::create(['name' => 'ciudades.edit']); 
		Permission::create(['name' => 'ciudades.active']); 
		Permission::create(['name' => 'ciudades.inactive']); 
		Permission::create(['name' => 'catalogos.store']); 
		Permission::create(['name' => 'catalogos.index']); 
		Permission::create(['name' => 'catalogos.create']); 
		Permission::create(['name' => 'catalogos.update']); 
		Permission::create(['name' => 'catalogos.destroy']); 
		Permission::create(['name' => 'catalogos.edit']); 
		Permission::create(['name' => 'catalogos.active']); 
		Permission::create(['name' => 'catalogos.inactive']); 
		Permission::create(['name' => 'empresas.store']);
		Permission::create(['name' => 'empresas.index']);
		Permission::create(['name' => 'empresas.create']);
		Permission::create(['name' => 'empresas.update']);
		Permission::create(['name' => 'empresas.edit']);
		Permission::create(['name' => 'empresas.destroy']);
		Permission::create(['name' => 'empresas.active']);
		Permission::create(['name' => 'empresas.inactive']);
		Permission::create(['name' => 'empresas.datatable']);
		Permission::create(['name' => 'categorias.store']); 
		Permission::create(['name' => 'categorias.index']); 
		Permission::create(['name' => 'categorias.create']); 
		Permission::create(['name' => 'categorias.update']); 
		Permission::create(['name' => 'categorias.edit']); 
		Permission::create(['name' => 'categorias.active']); 
		Permission::create(['name' => 'categorias.inactive']); 
		Permission::create(['name' => 'categorias.datatable']);
		Permission::create(['name' => 'subcategorias.store']); 
		Permission::create(['name' => 'subcategorias.index']); 
		Permission::create(['name' => 'subcategorias.create']); 
		Permission::create(['name' => 'subcategorias.update']); 
		Permission::create(['name' => 'subcategorias.edit']); 
		Permission::create(['name' => 'subcategorias.active']); 
		Permission::create(['name' => 'subcategorias.inactive']); 
		Permission::create(['name' => 'subcategorias.datatable']);
		Permission::create(['name' => 'almacenes.store']); 
		Permission::create(['name' => 'almacenes.index']); 
		Permission::create(['name' => 'almacenes.create']); 
		Permission::create(['name' => 'almacenes.update']); 
		Permission::create(['name' => 'almacenes.edit']); 
		Permission::create(['name' => 'almacenes.active']); 
		Permission::create(['name' => 'almacenes.inactive']); 
		Permission::create(['name' => 'almacenes.datatable']);
		Permission::create(['name' => 'tiendas.store']); 
		Permission::create(['name' => 'tiendas.index']); 
		Permission::create(['name' => 'tiendas.create']); 
		Permission::create(['name' => 'tiendas.update']); 
		Permission::create(['name' => 'tiendas.edit']); 
		Permission::create(['name' => 'tiendas.active']); 
		Permission::create(['name' => 'tiendas.inactive']); 
		Permission::create(['name' => 'tiendas.datatable']);
		Permission::create(['name' => 'vendedores.store']); 
		Permission::create(['name' => 'vendedores.index']); 
		Permission::create(['name' => 'vendedores.create']); 
		Permission::create(['name' => 'vendedores.update']); 
		Permission::create(['name' => 'vendedores.edit']); 
		Permission::create(['name' => 'vendedores.active']); 
		Permission::create(['name' => 'vendedores.inactive']); 
		Permission::create(['name' => 'vendedores.datatable']);
		Permission::create(['name' => 'campanas.store']); 
		Permission::create(['name' => 'campanas.index']); 
		Permission::create(['name' => 'campanas.create']); 
		Permission::create(['name' => 'campanas.update']); 
		Permission::create(['name' => 'campanas.edit']); 
		Permission::create(['name' => 'campanas.active']); 
		Permission::create(['name' => 'campanas.inactive']); 
		Permission::create(['name' => 'campanas.datatable']);
		Permission::create(['name' => 'terceros.store']); 
		Permission::create(['name' => 'terceros.index']); 
		Permission::create(['name' => 'terceros.create']); 
		Permission::create(['name' => 'terceros.update']); 
		Permission::create(['name' => 'terceros.edit']); 
		Permission::create(['name' => 'terceros.active']); 
		Permission::create(['name' => 'terceros.inactive']); 
		Permission::create(['name' => 'terceros.datatable']);
		Permission::create(['name' => 'productos.store']); 
		Permission::create(['name' => 'productos.index']); 
		Permission::create(['name' => 'productos.create']); 
		Permission::create(['name' => 'productos.update']); 
		Permission::create(['name' => 'productos.edit']); 
		Permission::create(['name' => 'productos.active']); 
		Permission::create(['name' => 'productos.inactive']); 
		Permission::create(['name' => 'productos.datatable']);
		Permission::create(['name' => 'precios.store']); 
		Permission::create(['name' => 'precios.index']); 
		Permission::create(['name' => 'precios.create']); 
		Permission::create(['name' => 'precios.update']); 
		Permission::create(['name' => 'precios.edit']); 
		Permission::create(['name' => 'precios.active']); 
		Permission::create(['name' => 'precios.inactive']); 
		Permission::create(['name' => 'precios.datatable']);

		Permission::create(['name' => 'marcas.store']); 
		Permission::create(['name' => 'marcas.index']); 
		Permission::create(['name' => 'marcas.create']); 
		Permission::create(['name' => 'marcas.update']); 
		Permission::create(['name' => 'marcas.edit']); 
		Permission::create(['name' => 'marcas.active']); 
		Permission::create(['name' => 'marcas.inactive']); 
		Permission::create(['name' => 'marcas.datatable']);

		Permission::create(['name' => 'modelos.store']); 
		Permission::create(['name' => 'modelos.index']); 
		Permission::create(['name' => 'modelos.create']); 
		Permission::create(['name' => 'modelos.update']); 
		Permission::create(['name' => 'modelos.show']); 
		Permission::create(['name' => 'modelos.destroy']); 
		Permission::create(['name' => 'modelos.edit']); 
		Permission::create(['name' => 'modelos.active']); 
		Permission::create(['name' => 'modelos.inactive']); 


		Permission::create(['name' => 'bodegas.store']); 
		Permission::create(['name' => 'bodegas.index']); 
		Permission::create(['name' => 'bodegas.create']); 
		Permission::create(['name' => 'bodegas.update']); 
		Permission::create(['name' => 'bodegas.show']); 
		Permission::create(['name' => 'bodegas.destroy']); 
		Permission::create(['name' => 'bodegas.edit']); 
		Permission::create(['name' => 'bodegas.active']); 
		Permission::create(['name' => 'bodegas.inactive']); 

		Permission::create(['name' => 'ubicaciones.store']); 
		Permission::create(['name' => 'ubicaciones.index']); 
		Permission::create(['name' => 'ubicaciones.create']); 
		Permission::create(['name' => 'ubicaciones.update']); 
		Permission::create(['name' => 'ubicaciones.show']); 
		Permission::create(['name' => 'ubicaciones.destroy']); 
		Permission::create(['name' => 'ubicaciones.edit']); 
		Permission::create(['name' => 'ubicaciones.active']); 
		Permission::create(['name' => 'ubicaciones.inactive']); 


		Permission::create(['name' => 'clientes.store']); 
		Permission::create(['name' => 'clientes.index']); 
		Permission::create(['name' => 'clientes.create']); 
		Permission::create(['name' => 'clientes.update']); 
		Permission::create(['name' => 'clientes.edit']); 
		Permission::create(['name' => 'clientes.active']); 
		Permission::create(['name' => 'clientes.inactive']); 
		Permission::create(['name' => 'clientes.datatable']);

		Permission::create(['name' => 'colaboradores.store']); 
		Permission::create(['name' => 'colaboradores.index']); 
		Permission::create(['name' => 'colaboradores.create']); 
		Permission::create(['name' => 'colaboradores.update']); 
		Permission::create(['name' => 'colaboradores.edit']); 
		Permission::create(['name' => 'colaboradores.active']); 
		Permission::create(['name' => 'colaboradores.inactive']); 
		Permission::create(['name' => 'colaboradores.datatable']);

		Permission::create(['name' => 'proveedores.store']); 
		Permission::create(['name' => 'proveedores.index']); 
		Permission::create(['name' => 'proveedores.create']); 
		Permission::create(['name' => 'proveedores.update']); 
		Permission::create(['name' => 'proveedores.edit']); 
		Permission::create(['name' => 'proveedores.active']); 
		Permission::create(['name' => 'proveedores.inactive']); 
		Permission::create(['name' => 'proveedores.datatable']);
		

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