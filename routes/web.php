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

// ROTAS DOS FUNCIONÁRIOS

Route::get('/funcionario/', ['as' => 'funcionario.home', 'uses' => 'FuncionariosController@index']);

Route::get('/funcionario/remove/{id}', ['as' => 'funcionario.remover', 'uses' => 'FuncionariosController@remove']);

Route::post('/funcionario/salvar', ['as' => 'funcionario.salvar', 'uses' => 'FuncionariosController@save']);

Route::get('/funcionario/editar/{id}', ['as' => 'funcionario.editar', 'uses' => 'FuncionariosController@edit']);

Route::put('/funcionario/atualizar/{id}',['as'=>'funcionario.atualizar','uses'=>'FuncionariosController@update']);


// ROTAS DOS EQUIPAMENTOS

Route::get('/equipamento/', ['as' => 'equipamento.home', 'uses' => 'EquipamentosController@index']);

Route::get('/equipamento/remove/{id}', ['as' => 'equipamento.remover', 'uses' => 'EquipamentosController@remove']);

Route::post('/equipamento/salvar', ['as' => 'equipamento.salvar', 'uses' => 'EquipamentosController@save']);

Route::get('/equipamento/editar/{id}', ['as' => 'equipamento.editar', 'uses' => 'EquipamentosController@edit']);

Route::put('/equipamento/atualizar/{id}',['as'=>'equipamento.atualizar','uses'=>'EquipamentosController@update']);