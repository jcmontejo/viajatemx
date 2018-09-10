<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');

// Empleados
Route::get('/empleados', 'UserController@index');
Route::get('/empleados/crear', 'UserController@create');
Route::post('/empleados/guardar', 'UserController@store');
Route::get('/empleados/editar/{id}','UserController@edit');
Route::post('/empleados/update/', 'UserController@update');
Route::get('/empleados/eliminar/{id}', 'UserController@destroy')->name('empleados.destroy');
// Fin Empleados

// Roles
Route::resource('admin/roles', 'RoleController');
// Fin roles

// Wizard Form
Route::get('/cotizador', 'QuotingController@showQuoting')->name('cotizador');
Route::post('/guardar/cotizacion', 'QuotationController@store');

