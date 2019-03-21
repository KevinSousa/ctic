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
    return view('index');
});

// Route::get('/', ['as' => 'home' , 'uses' => 'UsersController@index']);

Route::get('/remover/{id}', ['as' => 'remover', 'uses' => 'Controller@remover']);

Route::post('/salvar', ['as' => 'salvar', 'uses' => 'Controller@salvar']);

Route::get('/editar/{id}', ['as' => 'editar', 'uses' => 'Controller@editar']);

Route::put('/atualizar/{id}',['as'=>'atualizar','uses'=>'Controller@atualizar']);



