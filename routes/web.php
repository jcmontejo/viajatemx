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
Route::get('/clientes/cotizador', 'QuotingController@showQuoting')->name('cotizador');
Route::post('/guardar/cotizacion', 'QuotationController@store');

// Ver solicitudes en admin
Route::get('/admin/solicitudes', 'QuotationController@index');
Route::get('/admin/solicitudes/procesar/{id}', 'QuotationController@process');
Route::post('/admin/solicitudes/enviar', 'QuotationController@send');

// Proveedores
Route::get('/admin/proveedores', 'ProviderController@index');
Route::get('/admin/proveedores/crear', 'ProviderController@create');
Route::post('/admin/proveedores/guardar', 'ProviderController@store');
Route::get('/admin/proveedores/editar/{id}', 'ProviderController@edit');
Route::post('/admin/proveedores/update/', 'ProviderController@update');
Route::get('/admin/proveedores/eliminar/{id}', 'ProviderController@destroy')->name('proveedores.destroy');

// Routes
Route::get('/admin/rutas', 'RouteController@index');
Route::post('/admin/rutas/guardar', 'RouteController@store');
Route::get('/admin/rutas/editar/{id}', 'RouteController@edit');
Route::post('/admin/rutas/update', 'RouteController@update');
Route::get('/admin/rutas/eliminar/{id}', 'RouteController@destroy')->name('rutas.destroy');

// Cards
Route::get('/admin/tarjetas', 'CardController@index');
Route::get('/admin/tarjetas/crear', 'CardController@create');
Route::post('/admin/tarjetas/guardar', 'CardController@store');
Route::get('/admin/tarjetas/editar/{id}', 'CardController@edit');
Route::post('/admin/tarjetas/update', 'CardController@update');
Route::get('/admin/tarjetas/eliminar/{id}', 'CardController@destroy')->name('tarjetas.destroy');

