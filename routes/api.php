<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'Api\UserController@show');

Route::namespace('Api')->group(function () {
    $only = ['index', 'show'];

    Route::apiResource('bloques', 'BloqueController')->only($only);
    Route::apiResource('categorias', 'CategoriaController')->only($only);
    Route::apiResource('diputados', 'DiputadoController')->only($only);
    Route::apiResource('documentos', 'DocumentoController')->only($only);
    Route::apiResource('eventos', 'EventoController')->only($only);
    Route::apiResource('noticias', 'NoticiaController')->only($only);
});
