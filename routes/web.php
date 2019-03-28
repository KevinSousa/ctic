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

// ROTAS DAS FUNCOES

Route::get('/funcao/', ['as' => 'funcao.index', 'uses' => 'FuncaoController@index']);

Route::post('/funcao/store', ['as' => 'funcao.store', 'uses' => 'FuncaoController@store']);

Route::get('/funcao/destroy/{id}', ['as' => 'funcao.destroy', 'uses' => 'FuncaoController@destroy']);

Route::get('/funcao/edit/{id}', ['as' => 'funcao.edit', 'uses' => 'FuncaoController@edit']);

Route::put('/funcao/update/{id}',['as'=>'funcao.update','uses'=>'FuncaoController@update']);

// ROTAS DE SALAS

Route::get('/sala/', ['as' => 'sala.home', 'uses' => 'SalasController@index']);

Route::get('/sala/remover/{id}', ['as' => 'sala.remover', 'uses' => 'SalasController@remove']);

Route::get('/sala/adicionar', ['as' => 'sala.adicionar', 'uses' => 'SalasController@add']);

Route::post('/sala/salvar', ['as' => 'sala.salvar', 'uses' => 'SalasController@save']);

Route::get('/sala/editar/{id}', ['as' => 'sala.editar', 'uses' => 'SalasController@edit']);

Route::put('/sala/autalizar{id}', ['as' => 'sala.atualizar', 'uses' => 'SalasController@update']);

// ROTAS DE TIPOS DE PROBLEMAS

Route::get('/tiposProblemas/', ['as' => 'tiposProblemas.index', 'uses' => 'TiposProblemasController@index']);

Route::post('/tiposProblemas/store', ['as' => 'tiposProblemas.store', 'uses' => 'TiposProblemasController@store']);

Route::get('/tiposProblemas/destroy/{id}', ['as' => 'tiposProblemas.destroy', 'uses' => 'TiposProblemasController@destroy']);

Route::get('/tiposProblemas/edit/{id}', ['as' => 'tiposProblemas.edit', 'uses' => 'TiposProblemasController@edit']);

Route::put('/tiposProblemas/update/{id}',['as'=>'tiposProblemas.update','uses'=>'TiposProblemasController@update']);

//ROTAS DE CHAMADOS faltando as algumas calma

Route::get('/chamados/', ['as' => 'chamados.index', 'uses' => 'ChamadosController@index']);
	
Route::get('/chamados/add', ['as' => 'chamados.add', 'uses' => 'ChamadosController@add']);