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
    return view('start');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('noticias', 'NoticiaController')->middleware('auth');
Route::resource('eventos', 'EventoController')->middleware('auth');
Route::resource('documentos', 'DocumentoController')->middleware('auth');
Route::resource('diputados', 'DiputadoController')->middleware('auth');
Route::resource('categorias', 'CategoriaController')->middleware('auth');