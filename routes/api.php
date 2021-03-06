<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Apenas testando o api
Route::get('/ping', function (Request $request) {
    return ['pong' => true];
});

Route::get('/notes', 'App\Http\Controllers\NoteController@all'); //Ver todas as anotações

Route::get('/note/{id}','App\Http\Controllers\NoteController@one'); //Ver anotação específica

Route::post('/note', 'App\Http\Controllers\NoteController@new'); //Adicionando a nota

Route::put('/note/{id}','App\Http\Controllers\NoteController@edit'); //Altera/Atualiza a nota

Route::delete('/note/{id}','App\Http\Controllers\NoteController@delete'); //Deletar a nota