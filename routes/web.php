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
use App\Ausencia;

Route::get('/', function () {
    return view('partials.home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/rrhh', 'HomeController@index')->name('rrhh');
	Route::get('/servicio-tecnico', 'HomeController@index')->name('servicio-tecnico');
	Route::get('/admin', 'HomeController@index')->name('admin');

	Route::resource('empresas','EmpresaController');
	Route::post('empresas/create', 'EmpresaController@store');
	Route::put('empresas/{id}/edit', 'EmpresaController@putEdit');

	Route::resource('centros','CentroController');
	Route::post('centros/create', 'CentroController@store');
	Route::put('centros/{id}/edit', 'CentroController@putEdit');

	Route::resource('datafonos','DatafonoController');
	Route::post('datafonos/create', 'DatafonoController@store');
	Route::put('datafonos/{id}/edit', 'DatafonoController@putEdit');

	Route::resource('departamentos','DepartamentoController');
	Route::post('departamentos/create', 'DepartamentoController@store');
	Route::put('departamentos/{id}/edit', 'DepartamentoController@putEdit');

	Route::resource('extensiones','ExtensionController');
	Route::post('extensiones/create', 'ExtensionController@store');
	Route::put('extensiones/{id}/edit', 'ExtensionController@putEdit');

	Route::resource('trabajadores','TrabajadorController');
	Route::post('trabajadores/create', 'TrabajadorController@store');
	Route::put('trabajadores/{id}/edit', 'TrabajadorController@putEdit');
	//Route::get('trabajadores.data', 'TrabajadorController@getTrabajadores')->name('trabajadores.data');

	Route::resource('ausencias','AusenciaController');
	Route::post('ausencias/create', 'AusenciaController@store');
	Route::put('ausencias/{id}/edit', 'AusenciaController@putEdit');

	Route::resource('trabajadortlfs','TrabajadortlfController');
	Route::post('trabajadortlfs/create', 'TrabajadortlfController@store');
	Route::put('trabajadortlfs/{id}/edit', 'TrabajadortlfController@putEdit');

	Route::resource('trabajos','TrabajoController');
	Route::post('trabajos/create', 'TrabajoController@store');
	Route::put('trabajos/{id}/edit', 'TrabajoController@putEdit');

	Route::post('/import-excel', 'ExcelController@importTrabajadores');

	Route::get('trabajadores.list', 'TrabajadorController@trabajadorList')->name('trabajadores.list');

	Route::resource('events', 'EventController');
});

Route::get('logout', 'Auth\LoginController@logout');
