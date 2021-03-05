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
	Route::post('admin/usuarios/store', 'UserController@store');
	Route::get('admin/usuarios', 'UserController@index');
	Route::get('admin/usuarios/create', 'UserController@create');
	Route::post('admin/usuarios/{id}/edit', 'UserController@update');
	Route::get('admin/usuarios/{role}', 'UserController@show');
	Route::delete('admin/usuarios/{id}', 'UserController@destroy');
	Route::get('admin/usuarios/{id}/edit', 'UserController@edit');
	Route::post('admin/usuarios/{id}/active', 'UserController@active');
	Route::post('admin/usuarios/{id}/inactive', 'UserController@inactive');

	Route::get('admin/perfil', 'UserController@show');
	Route::get('admin/perfil/{id}/edit', 'UserController@editarperfil');
	Route::post('admin/perfil/{id}/edit', 'UserController@updateperfil');


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




});