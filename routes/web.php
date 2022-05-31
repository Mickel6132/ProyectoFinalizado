

<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');

Route::get('/usuarios/create','UsuariosController@create')->name('usuarios.create');

Route::post('/usuarios/store','UsuariosController@store')->name('usuarios.store');

Route::get('/usuarios/edit/{usu_id}','UsuariosController@edit')->name('usuarios.edit');

Route::post('/usuarios/update/{usu_id}','UsuariosController@update')->name('usuarios.update');

Route::post('/usuarios/destroy/{cli_id}','UsuariosController@destroy')->name('usuarios.destroy');

Route::get('/clientes', 'ClienteController@index')->name('clientes');

Route::get('/clientes/create','ClienteController@create')->name('clientes.create');

Route::post('/clientes/store','ClienteController@store')->name('clientes.store');

Route::get('/clientes/edit/{cli_id}','ClienteController@edit')->name('clientes.edit');

Route::post('/clientes/update/{cli_id}','ClienteController@update')->name('clientes.update');

Route::post('/clientes/destroy/{cli_id}','ClienteController@destroy')->name('clientes.destroy');

Route::get('/componentes', 'ComponenteController@index')->name('componentes');

Route::get('/componentes/create','ComponenteController@create')->name('componentes.create');

Route::post('/componentes/store','ComponenteController@store')->name('componentes.store');

Route::get('/componentes/edit/{comp_id}','ComponenteController@edit')->name('componentes.edit');

Route::post('/componentes/update/{comp_id}','ComponenteController@update')->name('componentes.update');

Route::post('/componentes/destroy/{comp_id}','ComponenteController@destroy')->name('componentes.destroy');

Route::get('/ventas', 'VentasController@index')->name('ventas');

Route::get('/ventas/create','VentasController@create')->name('ventas.create');

Route::post('/ventas/store','VentasController@store')->name('ventas.store');

Route::get('/ventas/edit/{ven_id}','VentasController@edit')->name('ventas.edit');

Route::post('/ventas/update/{ven_id}','VentasController@update')->name('ventas.update');

Route::post('/ventas/destroy/{ven_id}','VentasController@destroy')->name('ventas.destroy');

Route::resource('/facturas', 'FacturasController');

Route::post('/facturas.detalle', 'FacturasController@detalle')->name('factura.detalle');

Route::post('/factura/search', 'FacturasController@index')->name('factura.search');

Route::get('/facturas.pdf/{fac_id}','FacturasController@facturas_pdf')->name('facturas.pdf');


