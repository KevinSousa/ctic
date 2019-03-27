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
    return view('welcome');
});

// ROTAS DOS FUNCIONÁRIOS

Route::get('/user/', ['as' => 'user.home', 'uses' => 'UsersController@index']);

Route::get('/user/remove/{id}', ['as' => 'user.remover', 'uses' => 'UsersController@remove']);

Route::post('/user/salvar', ['as' => 'user.salvar', 'uses' => 'UsersController@save']);

Route::get('/user/editar/{id}', ['as' => 'user.editar', 'uses' => 'UsersController@edit']);

Route::put('/user/atualizar/{id}',['as'=>'user.atualizar','uses'=>'UsersController@update']);


// ROTAS DOS EQUIPAMENTOS

Route::get('/equipamento/', ['as' => 'equipamento.home', 'uses' => 'EquipamentosController@index']);

Route::get('/equipamento/remove/{id}', ['as' => 'equipamento.remover', 'uses' => 'EquipamentosController@remove']);

Route::post('/equipamento/salvar', ['as' => 'equipamento.salvar', 'uses' => 'EquipamentosController@save']);

Route::get('/equipamento/editar/{id}', ['as' => 'equipamento.editar', 'uses' => 'EquipamentosController@edit']);

Route::put('/equipamento/atualizar/{id}',['as'=>'equipamento.atualizar','uses'=>'EquipamentosController@update']);

// ROTAS DE SALAS

Route::get('/sala/', ['as' => 'sala.home', 'uses' => 'SalasController@index']);

Route::get('/sala/remover/{id}', ['as' => 'user.remover', 'uses' => 'SalasController@remove']);


Route::post('/sala/salvar', ['as' => 'sala.salvar', 'uses' => 'SalasController@save']);
Route::get('/sala/adicionar', ['as' => 'sala.adicionar', 'uses' => 'SalasController@add']);

Route::get('/sala/editar/{id}', ['as' => 'sala.editar', 'uses' => 'SalasController@edit']);
Route::put('/sala/autalizar{id}', ['as' => 'sala.atualizar', 'uses' => 'SalasController@update']);