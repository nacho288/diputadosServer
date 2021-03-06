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

use Illuminate\Support\Facades\App;

Auth::routes([
    'register' => ! App::environment('production'),
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'start');

    Route::resource('noticias', 'NoticiaController');
    Route::resource('eventos', 'EventoController');
    Route::resource('documentos', 'DocumentoController');
    Route::resource('diputados', 'DiputadoController');
    Route::resource('categorias', 'CategoriaController');
    Route::resource('bloques', 'BloqueController');
    Route::resource('subbloques', 'SubbloqueController');
    Route::resource('internas', 'InternaController');
    Route::resource('especiales', 'EspecialeController');
    Route::resource('autoridades', 'AutoridadeController');
    Route::resource('empleados', 'EmpleadoController');
    Route::resource('oficinas', 'OficinaController');
    /*     Route::resource('roles', 'RolController'); */
    Route::post('roles/{id}', 'OficinaController@storeRol');
    Route::delete('roles/{id}', 'OficinaController@destroyRol');
    Route::resource('users', 'UserController');
});
