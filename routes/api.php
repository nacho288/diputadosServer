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
    Route::apiResource('categorias', 'CategoriaController')->only(['index', 'show']);
    Route::apiResource('diputados', 'DiputadoController')->only(['index', 'show']);
    Route::apiResource('documentos', 'DocumentoController')->only(['index', 'show']);
    Route::apiResource('eventos', 'EventoController')->only(['index', 'show']);
    Route::apiResource('noticias', 'NoticiaController')->only(['index', 'show']);
});
