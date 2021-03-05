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
	Route::post('admin/departamentos/store', 'DepartamentosController@store');
	Route::get('admin/departamentos', 'DepartamentosController@index');
	Route::get('admin/departamentos/create', 'DepartamentosController@create');
	Route::post('admin/departamentos/{id}/edit', 'DepartamentosController@update');
	Route::get('admin/departamentos/{id}', 'DepartamentosController@show');
	Route::delete('admin/departamentos/{id}', 'DepartamentosController@destroy');
	Route::get('admin/departamentos/{id}/edit', 'DepartamentosController@edit');
	Route::post('admin/departamentos/{id}/active', 'DepartamentosController@active');
	Route::post('admin/departamentos/{id}/inactive', 'DepartamentosController@inactive');


/*
|--------------------------------------------------------------------------
| Ciudades
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/ciudades/store', 'CiudadesController@store');
	Route::get('admin/ciudades', 'CiudadesController@index');
	Route::get('admin/ciudades/create', 'CiudadesController@create');
	Route::post('admin/ciudades/{id}/edit', 'CiudadesController@update');
	Route::get('admin/ciudades/{id}', 'CiudadesController@show');
	Route::delete('admin/ciudades/{id}', 'CiudadesController@destroy');
	Route::get('admin/ciudades/{id}/edit', 'CiudadesController@edit');
	Route::post('admin/ciudades/{id}/active', 'CiudadesController@active');
	Route::post('admin/ciudades/{id}/inactive', 'CiudadesController@inactive');


/*
|--------------------------------------------------------------------------
| Paises
|--------------------------------------------------------------------------
|
*/

Route::get('admin/paises', function () {
    return view('paises.index');
});




});