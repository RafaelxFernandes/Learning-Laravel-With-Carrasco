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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*ProdutoController*/
Route::get('/resource/{id}', 'ProdutoController@showResource');
Route::apiResource('produtos', 'ProdutoController');

/*ParceiroController*/
Route::get('/resource/{id}', 'ParceiroController@showResource');
Route::apiResource('parceiros', 'ParceiroController');

/*ServicoController*/
Route::get('/resource/{id}', 'ServicoController@showResource');
Route::apiResource('servicos', 'ServicoController');