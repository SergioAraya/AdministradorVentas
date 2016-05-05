<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// ------------ CLIENTES ------------
// Todos
Route::get('/clientes', 'ClienteController@getAll');
// Crear
Route::get('/clientes/crear', 'ClienteController@crearVista');
Route::post('/clientes/crear', 'ClienteController@create');
// Editar
Route::get('/clientes/{cliente}', 'ClienteController@getOne');
Route::post('/clientes/{cliente}', 'ClienteController@editOne');
// Eliminar
Route::delete('/clientes/{cliente}', 'ClienteController@deleteOne');

// ------------ FABRICAS ------------
// Todos
Route::get('/fabricas', 'FabricaController@getAll');
// Crear
Route::get('/fabricas/crear', 'FabricaController@crearVista');
Route::post('/fabricas/crear', 'FabricaController@create');
// Editar
Route::get('/fabricas/{fabrica}', 'FabricaController@getOne');
Route::post('/fabricas/{fabrica}', 'FabricaController@editOne');
// Eliminar
Route::delete('/fabricas/{fabrica}', 'FabricaController@deleteOne');

// ------------ FACTURAS ------------
// Todos
Route::get('/facturas', 'FacturaController@getAll');
// Crear
Route::get('/facturas/crear', 'FacturaController@crearVista');
Route::post('/facturas/crear', 'FacturaController@create');
// Editar
Route::get('/facturas/{factura}', 'FacturaController@getOne');
Route::post('/facturas/{factura}', 'FacturaController@editOne');
// Eliminar
Route::delete('/facturas/{factura}', 'FacturaController@deleteOne');
