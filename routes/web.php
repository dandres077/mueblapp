<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::middleware(['auth'])->group(function(){

	Route::get('admin/home', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/roles/store', 'RoleController@store');
	Route::get('admin/roles', 'RoleController@index');
	Route::get('admin/roles/create', 'RoleController@create');
	Route::post('admin/roles/{id}/edit', 'RoleController@update');
	Route::get('admin/roles/{id}', 'RoleController@show');
	Route::delete('admin/roles/{id}', 'RoleController@destroy');
	Route::get('admin/roles/{id}/edit', 'RoleController@edit');

/*
|--------------------------------------------------------------------------
| Permisos
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/permisos/store', 'PermisosController@store');
	Route::get('admin/permisos', 'PermisosController@index');
	Route::get('admin/permisos/create', 'PermisosController@create');
	Route::put('admin/permisos/{role}', 'PermisosController@edit');
	Route::get('admin/permisos/{role}', 'PermisosController@show');
	Route::delete('admin/permisos/{role}', 'PermisosController@destroy');
	Route::get('admin/permisos/{role}/edit', 'PermisosController@edit');

/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/usuarios/store', 'UserController@store')->middleware('permiso:usuarios.store'); 
	Route::get('admin/usuarios', 'UserController@index')->middleware('permiso:usuarios.index'); 
	Route::get('admin/usuarios/create', 'UserController@create')->middleware('permiso:usuarios.create'); 
	Route::post('admin/usuarios/{id}/edit', 'UserController@update')->middleware('permiso:usuarios.update'); 
	Route::get('admin/usuarios/{role}', 'UserController@show')->middleware('permiso:usuarios.show'); 
	Route::delete('admin/usuarios/{id}', 'UserController@destroy')->middleware('permiso:usuarios.destroy'); 
	Route::get('admin/usuarios/{id}/edit', 'UserController@edit')->middleware('permiso:usuarios.edit'); 
	Route::post('admin/usuarios/{id}/active', 'UserController@active')->middleware('permiso:usuarios.active'); 
	Route::post('admin/usuarios/{id}/inactive', 'UserController@inactive')->middleware('permiso:usuarios.inactive'); 
	Route::post('admin/usuarios/pwd', 'UserController@pwd')->name('usuarios.pwd'); 

	Route::get('admin/perfil', 'UserController@show')->middleware('permiso:usuarios.show'); 
	Route::get('admin/perfil/{id}/edit', 'UserController@editarperfil')->middleware('permiso:usuarios.editarperfil'); 
	Route::post('admin/perfil/{id}/edit', 'UserController@updateperfil')->middleware('permiso:usuarios.updateperfil'); 


/*
|--------------------------------------------------------------------------
| Departamentos
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/departamentos/store', 'DepartamentosController@store')->middleware('permiso:departamentos.store'); 
	Route::get('admin/departamentos', 'DepartamentosController@index')->middleware('permiso:departamentos.index'); 
	Route::get('admin/departamentos/create', 'DepartamentosController@create')->middleware('permiso:departamentos.create'); 
	Route::post('admin/departamentos/{id}/edit', 'DepartamentosController@update')->middleware('permiso:departamentos.update'); 
	Route::get('admin/departamentos/{id}', 'DepartamentosController@show')->middleware('permiso:departamentos.show'); 
	Route::delete('admin/departamentos/{id}', 'DepartamentosController@destroy')->middleware('permiso:departamentos.destroy'); 
	Route::get('admin/departamentos/{id}/edit', 'DepartamentosController@edit')->middleware('permiso:departamentos.edit'); 
	Route::post('admin/departamentos/{id}/active', 'DepartamentosController@active')->middleware('permiso:departamentos.active'); 
	Route::post('admin/departamentos/{id}/inactive', 'DepartamentosController@inactive')->middleware('permiso:departamentos.inactive'); 


/*
|--------------------------------------------------------------------------
| Ciudades
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/ciudades/store', 'CiudadesController@store')->middleware('permiso:ciudades.store'); 
	Route::get('admin/ciudades', 'CiudadesController@index')->middleware('permiso:ciudades.index'); 
	Route::get('admin/ciudades/create', 'CiudadesController@create')->middleware('permiso:ciudades.create'); 
	Route::post('admin/ciudades/{id}/edit', 'CiudadesController@update')->middleware('permiso:ciudades.update'); 
	Route::get('admin/ciudades/{id}', 'CiudadesController@show')->middleware('permiso:ciudades.show'); 
	Route::delete('admin/ciudades/{id}', 'CiudadesController@destroy')->middleware('permiso:ciudades.destroy'); 
	Route::get('admin/ciudades/{id}/edit', 'CiudadesController@edit')->middleware('permiso:ciudades.edit'); 
	Route::post('admin/ciudades/{id}/active', 'CiudadesController@active')->middleware('permiso:ciudades.active'); 
	Route::post('admin/ciudades/{id}/inactive', 'CiudadesController@inactive')->middleware('permiso:ciudades.inactive'); 


/*
|--------------------------------------------------------------------------
| Paises
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/paises/store', 'PaisesController@store')->middleware('permiso:paises.store'); 
	Route::get('admin/paises', 'PaisesController@index')->middleware('permiso:paises.index'); 
	Route::get('admin/paises/create', 'PaisesController@create')->middleware('permiso:paises.create'); 
	Route::post('admin/paises/{id}/edit', 'PaisesController@update')->middleware('permiso:paises.update'); 
	Route::get('admin/paises/{id}/edit', 'PaisesController@edit')->middleware('permiso:paises.edit'); 
	Route::post('admin/paises/{id}/active', 'PaisesController@active')->middleware('permiso:paises.active'); 
	Route::post('admin/paises/{id}/inactive', 'PaisesController@inactive')->middleware('permiso:paises.inactive'); 

/*
|--------------------------------------------------------------------------
| Catálogos
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/catalogos/store', 'CatalogosController@store')->middleware('permiso:catalogos.store'); 
	Route::get('admin/catalogos', 'CatalogosController@index')->middleware('permiso:catalogos.index'); 
	Route::get('admin/catalogos/create', 'CatalogosController@create')->middleware('permiso:catalogos.create'); 
	Route::post('admin/catalogos/{id}/edit', 'CatalogosController@update')->middleware('permiso:catalogos.update'); 
	Route::delete('admin/catalogos/{id}', 'CatalogosController@destroy')->middleware('permiso:catalogos.destroy'); 
	Route::get('admin/catalogos/{id}/edit', 'CatalogosController@edit')->middleware('permiso:catalogos.edit'); 
	Route::post('admin/catalogos/{id}/active', 'CatalogosController@active')->middleware('permiso:catalogos.active'); 
	Route::post('admin/catalogos/{id}/inactive', 'CatalogosController@inactive')->middleware('permiso:catalogos.inactive'); 

/*
|--------------------------------------------------------------------------
| Empresas
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/empresas/store', 'EmpresasController@store')->middleware('permiso:empresas.store'); 
	Route::get('admin/empresas', 'EmpresasController@index')->middleware('permiso:empresas.index'); 
	Route::get('admin/empresas/create', 'EmpresasController@create')->middleware('permiso:empresas.create'); 
	Route::post('admin/empresas/{id}/edit', 'EmpresasController@update')->middleware('permiso:empresas.update'); 
	Route::get('admin/empresas/{id}/edit', 'EmpresasController@edit')->middleware('permiso:empresas.edit'); 
	Route::delete('admin/empresas/{id}', 'EmpresasController@destroy')->middleware('permiso:catalogos.destroy'); 
	Route::post('admin/empresas/{id}/active', 'EmpresasController@active')->middleware('permiso:empresas.active'); 
	Route::post('admin/empresas/{id}/inactive', 'EmpresasController@inactive')->middleware('permiso:empresas.inactive'); 
	Route::get('admin/empresas/data/informacion', 'EmpresasController@empresas')->name('empresas.datatable')->middleware('permiso:empresas.datatable');

/*
|--------------------------------------------------------------------------
| Categorías productos
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/categorias/store', 'CategoriasController@store')->middleware('permiso:categorias.store'); 
	Route::get('admin/categorias', 'CategoriasController@index')->middleware('permiso:categorias.index'); 
	Route::get('admin/categorias/create', 'CategoriasController@create')->middleware('permiso:categorias.create'); 
	Route::post('admin/categorias/{id}/edit', 'CategoriasController@update')->middleware('permiso:categorias.update'); 
	Route::get('admin/categorias/{id}/edit', 'CategoriasController@edit')->middleware('permiso:categorias.edit'); 
	Route::post('admin/categorias/{id}/active', 'CategoriasController@active')->middleware('permiso:categorias.active'); 
	Route::post('admin/categorias/{id}/inactive', 'CategoriasController@inactive')->middleware('permiso:categorias.inactive'); 
	Route::get('admin/categorias/data/informacion', 'CategoriasController@categorias')->name('categorias.datatable')->middleware('permiso:categorias.datatable');


/*
|--------------------------------------------------------------------------
| Subcategorías productos
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/subcategorias/store', 'SubcategoriasController@store')->middleware('permiso:subcategorias.store'); 
	Route::get('admin/subcategorias', 'SubcategoriasController@index')->middleware('permiso:subcategorias.index'); 
	Route::get('admin/subcategorias/create', 'SubcategoriasController@create')->middleware('permiso:subcategorias.create'); 
	Route::post('admin/subcategorias/{id}/edit', 'SubcategoriasController@update')->middleware('permiso:subcategorias.update'); 
	Route::get('admin/subcategorias/{id}/edit', 'SubcategoriasController@edit')->middleware('permiso:subcategorias.edit'); 
	Route::post('admin/subcategorias/{id}/active', 'SubcategoriasController@active')->middleware('permiso:subcategorias.active'); 
	Route::post('admin/subcategorias/{id}/inactive', 'SubcategoriasController@inactive')->middleware('permiso:subcategorias.inactive'); 
	Route::get('admin/subcategorias/data/informacion', 'SubcategoriasController@subcategorias')->name('subcategorias.datatable')->middleware('permiso:subcategorias.datatable');

/*
|--------------------------------------------------------------------------
| Almacenes
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/almacenes/store', 'AlmacenesController@store')->middleware('permiso:almacenes.store'); 
	Route::get('admin/almacenes', 'AlmacenesController@index')->middleware('permiso:almacenes.index'); 
	Route::get('admin/almacenes/create', 'AlmacenesController@create')->middleware('permiso:almacenes.create'); 
	Route::post('admin/almacenes/{id}/edit', 'AlmacenesController@update')->middleware('permiso:almacenes.update'); 
	Route::get('admin/almacenes/{id}/edit', 'AlmacenesController@edit')->middleware('permiso:almacenes.edit'); 
	Route::post('admin/almacenes/{id}/active', 'AlmacenesController@active')->middleware('permiso:almacenes.active'); 
	Route::post('admin/almacenes/{id}/inactive', 'AlmacenesController@inactive')->middleware('permiso:almacenes.inactive'); 
	Route::get('admin/almacenes/data/informacion', 'AlmacenesController@almacenes')->name('almacenes.datatable')->middleware('permiso:almacenes.datatable');

/*
|--------------------------------------------------------------------------
| Tiendas
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/tiendas/store', 'TiendasController@store')->middleware('permiso:tiendas.store'); 
	Route::get('admin/tiendas', 'TiendasController@index')->middleware('permiso:tiendas.index'); 
	Route::get('admin/tiendas/create', 'TiendasController@create')->middleware('permiso:tiendas.create'); 
	Route::post('admin/tiendas/{id}/edit', 'TiendasController@update')->middleware('permiso:tiendas.update'); 
	Route::get('admin/tiendas/{id}/edit', 'TiendasController@edit')->middleware('permiso:tiendas.edit'); 
	Route::post('admin/tiendas/{id}/active', 'TiendasController@active')->middleware('permiso:tiendas.active'); 
	Route::post('admin/tiendas/{id}/inactive', 'TiendasController@inactive')->middleware('permiso:tiendas.inactive'); 
	Route::get('admin/tiendas/data/informacion', 'TiendasController@tiendas')->name('tiendas.datatable')->middleware('permiso:tiendas.datatable');

/*
|--------------------------------------------------------------------------
| Vendedores
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/vendedores/store', 'VendedoresController@store')->middleware('permiso:vendedores.store'); 
	Route::get('admin/vendedores', 'VendedoresController@index')->middleware('permiso:vendedores.index'); 
	Route::get('admin/vendedores/create', 'VendedoresController@create')->middleware('permiso:vendedores.create'); 
	Route::post('admin/vendedores/{id}/edit', 'VendedoresController@update')->middleware('permiso:vendedores.update'); 
	Route::get('admin/vendedores/{id}/edit', 'VendedoresController@edit')->middleware('permiso:vendedores.edit'); 
	Route::post('admin/vendedores/{id}/active', 'VendedoresController@active')->middleware('permiso:vendedores.active'); 
	Route::post('admin/vendedores/{id}/inactive', 'VendedoresController@inactive')->middleware('permiso:vendedores.inactive'); 
	Route::get('admin/vendedores/data/informacion', 'VendedoresController@vendedores')->name('vendedores.datatable')->middleware('permiso:vendedores.datatable');

/*
|--------------------------------------------------------------------------
| Campanas
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/campanas/store', 'CampanasController@store')->middleware('permiso:campanas.store'); 
	Route::get('admin/campanas', 'CampanasController@index')->middleware('permiso:campanas.index'); 
	Route::get('admin/campanas/create', 'CampanasController@create')->middleware('permiso:campanas.create'); 
	Route::post('admin/campanas/{id}/edit', 'CampanasController@update')->middleware('permiso:campanas.update'); 
	Route::get('admin/campanas/{id}/edit', 'CampanasController@edit')->middleware('permiso:campanas.edit'); 
	Route::post('admin/campanas/{id}/active', 'CampanasController@active')->middleware('permiso:campanas.active'); 
	Route::post('admin/campanas/{id}/inactive', 'CampanasController@inactive')->middleware('permiso:campanas.inactive'); 
	Route::get('admin/campanas/data/informacion', 'CampanasController@campanas')->name('campanas.datatable')->middleware('permiso:campanas.datatable');

/*
|--------------------------------------------------------------------------
| Terceros
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/terceros/store', 'TercerosController@store')->middleware('permiso:terceros.store'); 
	Route::get('admin/terceros', 'TercerosController@index')->middleware('permiso:terceros.index'); 
	Route::get('admin/terceros/create', 'TercerosController@create')->middleware('permiso:terceros.create'); 
	Route::post('admin/terceros/{id}/edit', 'TercerosController@update')->middleware('permiso:terceros.update'); 
	Route::get('admin/terceros/{id}/edit', 'TercerosController@edit')->middleware('permiso:terceros.edit'); 
	Route::post('admin/terceros/{id}/active', 'TercerosController@active')->middleware('permiso:terceros.active'); 
	Route::post('admin/terceros/{id}/inactive', 'TercerosController@inactive')->middleware('permiso:terceros.inactive'); 
	Route::get('admin/terceros/data/informacion', 'TercerosController@terceros')->name('terceros.datatable')->middleware('permiso:terceros.datatable');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/productos/store', 'ProductosController@store')->middleware('permiso:productos.store'); 
	Route::get('admin/productos', 'ProductosController@index')->middleware('permiso:productos.index'); 
	Route::get('admin/productos/create', 'ProductosController@create')->middleware('permiso:productos.create'); 
	Route::post('admin/productos/{id}/edit', 'ProductosController@update')->middleware('permiso:productos.update'); 
	Route::get('admin/productos/{id}/edit', 'ProductosController@edit')->middleware('permiso:productos.edit'); 
	Route::post('admin/productos/{id}/active', 'ProductosController@active')->middleware('permiso:productos.active'); 
	Route::post('admin/productos/{id}/inactive', 'ProductosController@inactive')->middleware('permiso:productos.inactive'); 
	Route::get('admin/productos/data/informacion', 'ProductosController@productos')->name('productos.datatable')->middleware('permiso:productos.datatable');


/*
|--------------------------------------------------------------------------
| Precios
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/precios/store', 'PreciosController@store')->middleware('permiso:precios.store'); 
	Route::get('admin/precios', 'PreciosController@index')->middleware('permiso:precios.index'); 
	Route::get('admin/precios/create', 'PreciosController@create')->middleware('permiso:precios.create'); 
	Route::post('admin/precios/{id}/edit', 'PreciosController@update')->middleware('permiso:precios.update'); 
	Route::get('admin/precios/{id}/edit', 'PreciosController@edit')->middleware('permiso:precios.edit'); 
	Route::post('admin/precios/{id}/active', 'PreciosController@active')->middleware('permiso:precios.active'); 
	Route::post('admin/precios/{id}/inactive', 'PreciosController@inactive')->middleware('permiso:precios.inactive'); 
	Route::get('admin/precios/data/informacion', 'PreciosController@precios')->name('precios.datatable')->middleware('permiso:precios.datatable');


/*
|--------------------------------------------------------------------------
| Marcas
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/marcas/store', 'MarcasController@store')->middleware('permiso:marcas.store'); 
	Route::get('admin/marcas', 'MarcasController@index')->middleware('permiso:marcas.index'); 
	Route::get('admin/marcas/create', 'MarcasController@create')->middleware('permiso:marcas.create'); 
	Route::post('admin/marcas/{id}/edit', 'MarcasController@update')->middleware('permiso:marcas.update'); 
	Route::get('admin/marcas/{id}/edit', 'MarcasController@edit')->middleware('permiso:marcas.edit'); 
	Route::post('admin/marcas/{id}/active', 'MarcasController@active')->middleware('permiso:marcas.active'); 
	Route::post('admin/marcas/{id}/inactive', 'MarcasController@inactive')->middleware('permiso:marcas.inactive'); 

/*
|--------------------------------------------------------------------------
| Modelos
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/modelos/store', 'ModelosController@store')->middleware('permiso:modelos.store'); 
	Route::get('admin/modelos', 'ModelosController@index')->middleware('permiso:modelos.index'); 
	Route::get('admin/modelos/create', 'ModelosController@create')->middleware('permiso:modelos.create'); 
	Route::post('admin/modelos/{id}/edit', 'ModelosController@update')->middleware('permiso:modelos.update'); 
	Route::get('admin/modelos/{id}', 'ModelosController@show')->middleware('permiso:modelos.show'); 
	Route::delete('admin/modelos/{id}', 'ModelosController@destroy')->middleware('permiso:modelos.destroy'); 
	Route::get('admin/modelos/{id}/edit', 'ModelosController@edit')->middleware('permiso:modelos.edit'); 
	Route::post('admin/modelos/{id}/active', 'ModelosController@active')->middleware('permiso:modelos.active'); 
	Route::post('admin/modelos/{id}/inactive', 'ModelosController@inactive')->middleware('permiso:modelos.inactive'); 


/*
|--------------------------------------------------------------------------
| Modelos
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/ingenieros/store', 'ingenierosController@store')->middleware('permiso:ingenieros.store'); 
	Route::get('admin/ingenieros', 'ingenierosController@index')->middleware('permiso:ingenieros.index'); 
	Route::get('admin/ingenieros/create', 'ingenierosController@create')->middleware('permiso:ingenieros.create'); 
	Route::post('admin/ingenieros/{id}/edit', 'ingenierosController@update')->middleware('permiso:ingenieros.update'); 
	Route::get('admin/ingenieros/{id}', 'ingenierosController@show')->middleware('permiso:ingenieros.show'); 
	Route::delete('admin/ingenieros/{id}', 'ingenierosController@destroy')->middleware('permiso:ingenieros.destroy'); 
	Route::get('admin/ingenieros/{id}/edit', 'ingenierosController@edit')->middleware('permiso:ingenieros.edit'); 
	Route::post('admin/ingenieros/{id}/active', 'ingenierosController@active')->middleware('permiso:ingenieros.active'); 
	Route::post('admin/ingenieros/{id}/inactive', 'ingenierosController@inactive')->middleware('permiso:ingenieros.inactive'); 


/*
|--------------------------------------------------------------------------
| Bodegas
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/bodegas/store', 'BodegasController@store')->middleware('permiso:bodegas.store'); 
	Route::get('admin/bodegas', 'BodegasController@index')->middleware('permiso:bodegas.index'); 
	Route::get('admin/bodegas/create', 'BodegasController@create')->middleware('permiso:bodegas.create'); 
	Route::post('admin/bodegas/{id}/edit', 'BodegasController@update')->middleware('permiso:bodegas.update'); 
	Route::get('admin/bodegas/{id}/edit', 'BodegasController@edit')->middleware('permiso:bodegas.edit'); 
	Route::post('admin/bodegas/{id}/active', 'BodegasController@active')->middleware('permiso:bodegas.active'); 
	Route::post('admin/bodegas/{id}/inactive', 'BodegasController@inactive')->middleware('permiso:bodegas.inactive'); 


/*
|--------------------------------------------------------------------------
| Ubicaciones
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/ubicaciones/store', 'UbicacionesController@store')->middleware('permiso:ubicaciones.store'); 
	Route::get('admin/ubicaciones', 'UbicacionesController@index')->middleware('permiso:ubicaciones.index'); 
	Route::get('admin/ubicaciones/create', 'UbicacionesController@create')->middleware('permiso:ubicaciones.create'); 
	Route::post('admin/ubicaciones/{id}/edit', 'UbicacionesController@update')->middleware('permiso:ubicaciones.update'); 
	Route::get('admin/ubicaciones/{id}/edit', 'UbicacionesController@edit')->middleware('permiso:ubicaciones.edit'); 
	Route::post('admin/ubicaciones/{id}/active', 'UbicacionesController@active')->middleware('permiso:ubicaciones.active'); 
	Route::post('admin/ubicaciones/{id}/inactive', 'UbicacionesController@inactive')->middleware('permiso:ubicaciones.inactive'); 


/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/clientes/store', 'ClientesController@store')->middleware('permiso:clientes.store'); 
	Route::get('admin/clientes', 'ClientesController@index')->middleware('permiso:clientes.index'); 
	Route::get('admin/clientes/create', 'ClientesController@create')->middleware('permiso:clientes.create'); 
	Route::post('admin/clientes/{id}/edit', 'ClientesController@update')->middleware('permiso:clientes.update'); 
	Route::get('admin/clientes/{id}/edit', 'ClientesController@edit')->middleware('permiso:clientes.edit'); 
	Route::post('admin/clientes/{id}/active', 'ClientesController@active')->middleware('permiso:clientes.active'); 
	Route::post('admin/clientes/{id}/inactive', 'ClientesController@inactive')->middleware('permiso:clientes.inactive'); 
	Route::get('admin/clientes/data/informacion', 'ClientesController@clientes')->name('clientes.datatable')->middleware('permiso:clientes.datatable');

});