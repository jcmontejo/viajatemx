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

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
// End config routes

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
Route::get('/admin/solicitudes/terminar/{id}', 'QuotationController@sale');
Route::get('/admin/solicitudes/editar/{id}', 'QuotationController@edit');
Route::post('/admin/solicitudes/update/', 'QuotationController@update');

// Proveedores
Route::get('/proveedores', 'ProviderController@index');
Route::get('/proveedores/crear', 'ProviderController@create');
Route::post('/proveedores/guardar', 'ProviderController@store');
Route::get('/proveedores/editar/{id}', 'ProviderController@edit');
Route::post('/proveedores/update/', 'ProviderController@update');
Route::get('/proveedores/eliminar/{id}', 'ProviderController@destroy')->name('proveedores.destroy');

// Routes
Route::get('/rutas', 'RouteController@index');
Route::post('/rutas/guardar', 'RouteController@store');
Route::get('/rutas/editar/{id}', 'RouteController@edit');
Route::post('/rutas/update', 'RouteController@update');
Route::get('/rutas/eliminar/{id}', 'RouteController@destroy')->name('rutas.destroy');

// Cards
Route::get('/admin/tarjetas', 'CardController@index');
Route::get('/admin/tarjetas/crear', 'CardController@create');
Route::post('/admin/tarjetas/guardar', 'CardController@store');
Route::get('/admin/tarjetas/editar/{id}', 'CardController@edit');
Route::post('/admin/tarjetas/update', 'CardController@update');
Route::get('/admin/tarjetas/eliminar/{id}', 'CardController@destroy')->name('tarjetas.destroy');

// Sales
Route::get('/admin/ventas', 'SaleController@index');
Route::get('/admin/ventas/pagadas', 'SaleController@payments');
Route::get('/admin/ventas/adeudo', 'SaleController@debts');
Route::post('/admin/ventas/guardar', 'SaleController@store');
Route::get('/admin/generar/venta', 'SaleController@generate');
Route::post('/admin/generar/venta/guardar', 'SaleController@generateSave');

// Clients
Route::get('/admin/clientes', 'ClientController@index');
Route::get('/admin/clientes/crear', 'ClientController@create');
Route::post('/admin/clientes/guardar', 'ClientController@store');
Route::get('/admin/clientes/editar/{id}', 'ClientController@edit');
Route::post('/admin/clientes/update', 'ClientController@update');
Route::get('/admin/clientes/eliminar/{id}', 'ClientController@destroy')->name('clientes.destroy');

// Ingresos
Route::get('/ingresos', 'IncomeController@index');

// Gastos
Route::get('/gastos', 'ExpenseController@index');

// Cumpleaños
Route::get('/cumpleaños/{id}',function($id){
    $client = App\Client::find($id);
    return view('birthday',compact('client'));
});