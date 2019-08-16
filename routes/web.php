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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'start');

    Route::resource('noticias', 'NoticiaController');
    Route::resource('eventos', 'EventoController');
    Route::resource('documentos', 'DocumentoController');
    Route::resource('diputados', 'DiputadoController');
    Route::resource('categorias', 'CategoriaController');
});
