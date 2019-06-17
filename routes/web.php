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

//ROTAS DO LOGIN

Route::post('/user/salvar', ['as' => 'user.salvar', 'uses' => 'UsersController@save']);

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::get('/login/sair', ['as' => 'login.sair', 'uses' => 'LoginController@logout']);
Route::post('/login/entrar', ['as'=>'login.entrar', 'uses'=>'LoginController@login']);	

Route::get('/user/cadastrar', ['as' => 'user.cadastrar', 'uses' => 'UsersController@cadastrar']);

/* rota tradicional do método Auth*/
Auth::routes();

Route::group(['middleware'=>'auth'],function() {
	
	Route::get('/', ['as' => 'home', 'uses' => 'ChartController@index']);
	
	// ROTAS DOS FUNCIONÁRIOS

	Route::get('/user/', ['as' => 'user.home', 'uses' => 'UsersController@index']);

	Route::get('/user/remove/{id}', ['as' => 'user.remover', 'uses' => 'UsersController@remove']);

	Route::get('/user/conta/{id}', ['as' => 'user.conta', 'uses' => 'UsersController@conta']);

	Route::get('/user/editar/{id}', ['as' => 'user.editar', 'uses' => 'UsersController@edit']);

	Route::post('/user/update/{id}',['as'=>'user.update','uses'=>'UsersController@update']);

	// ROTAS DAS FUNCOES

	Route::get('/funcao/', ['as' => 'funcao.index', 'uses' => 'FuncaoController@index']);

	Route::put('/funcao/store', ['as' => 'funcao.store', 'uses' => 'FuncaoController@store']);

	Route::get('/funcao/create', ['as' => 'funcao.create', 'uses' => 'FuncaoController@create']);

	Route::get('/funcao/destroy/{id}', ['as' => 'funcao.destroy', 'uses' => 'FuncaoController@destroy']);

	Route::get('/funcao/edit/{id}', ['as' => 'funcao.edit', 'uses' => 'FuncaoController@edit']);

	Route::put('/funcao/update/{id}',['as'=>'funcao.update','uses'=>'FuncaoController@update']);

	// ROTAS DOS EQUIPAMENTOS

	Route::get('/equipamento/', ['as' => 'equipamento.index', 'uses' => 'EquipamentosController@index']);

	Route::put('/equipamento/store', ['as' => 'equipamento.store', 'uses' => 'EquipamentosController@store']);

	Route::get('/equipamento/create', ['as' => 'equipamento.create', 'uses' => 'EquipamentosController@create']);

	Route::get('/equipamento/destroy/{id}', ['as' => 'equipamento.destroy', 'uses' => 'EquipamentosController@destroy']);

	Route::get('/equipamento/edit/{id}', ['as' => 'equipamento.edit', 'uses' => 'EquipamentosController@edit']);

	Route::put('/equipamento/update/{id}',['as'=>'equipamento.update','uses'=>'EquipamentosController@update']);

	// ROTAS DE SALAS

	Route::get('/sala/', ['as' => 'sala.home', 'uses' => 'SalasController@index']);

	Route::get('/sala/remover/{id}', ['as' => 'sala.remover', 'uses' => 'SalasController@remove']);

	Route::get('/sala/adicionar', ['as' => 'sala.adicionar', 'uses' => 'SalasController@add']);

	Route::post('/sala/salvar', ['as' => 'sala.salvar', 'uses' => 'SalasController@save']);

	Route::get('/sala/editar/{id}', ['as' => 'sala.editar', 'uses' => 'SalasController@edit']);

	Route::put('/sala/atualizar/{id}', ['as' => 'sala.atualizar', 'uses' => 'SalasController@update']);

	// ROTAS DE TIPOS DE PROBLEMAS

	Route::get('/tiposProblemas/', ['as' => 'tiposProblemas.index', 'uses' => 'TiposProblemasController@index']);

	Route::get('/tiposProblemas/create', ['as' => 'tiposProblemas.create', 'uses' => 'TiposProblemasController@create']);

	Route::post('/tiposProblemas/store', ['as' => 'tiposProblemas.store', 'uses' => 'TiposProblemasController@store']);

	Route::get('/tiposProblemas/destroy/{id}', ['as' => 'tiposProblemas.destroy', 'uses' => 'TiposProblemasController@destroy']);

	Route::get('/tiposProblemas/edit/{id}', ['as' => 'tiposProblemas.edit', 'uses' => 'TiposProblemasController@edit']);

	Route::put('/tiposProblemas/update/{id}',['as'=>'tiposProblemas.update','uses'=>'TiposProblemasController@update']);

	    //Rota para listar as sublistas dos tipos de problemas
	Route::get('/subLista/list/{id}', ['as' => 'sublist.list', 'uses' => 'TiposProblemasController@listSublist']);    

	//ROTAS DE CHAMADOS 

	Route::get('/chamados/', ['as' => 'chamados.index', 'uses' => 'ChamadosController@index']);
		
	Route::get('/chamados/add', ['as' => 'chamados.add', 'uses' => 'ChamadosController@add']);

	Route::post('/chamados/salvar', ['as' => 'chamados.salvar', 'uses' => 'ChamadosController@save']);

	Route::get('/chamados/{id}', ['as' => 'chamados.detalhes', 'uses' => 'ChamadosController@detalhes']);

	Route::get('/chamados/destroy/{id}', ['as' => 'chamados.destroy', 'uses' => 'ChamadosController@remove']);

	Route::get('/chamados/edit/{id}', ['as' => 'chamados.edit', 'uses' => 'ChamadosController@edit']);

	Route::post('/chamados/update/{id}', ['as' => 'chamados.update', 'uses' => 'ChamadosController@update']);

	Route::post('/chamados/status/{id}', ['as' => 'chamados.status', 'uses' => 'ChamadosController@status']);

	Route::get('calendar', ['as'=>'calendar', 'uses'=>'EventController@index']);
	Route::get('calendar/addEvent', ['as'=>'calendar.addEvent', 'uses'=>'EventController@addEvent']);
	Route::post('calendar/saveEvent', ['as'=>'calendar.saveEvent', 'uses'=>'EventController@saveEvent']);

	Route::get( 'erickson', function(){
		Mail::send('mail.treinaweb',['curso'=>'Eloquent'], function($m){
			$m->from('erickson.rinho@gmail.com', 'Erickson');
			$m->subject('Cadastro realizado com sucesso!');
			$m->to('erickson.rinho@gmail.com');
		});
	});
	

	//Datatables
	Route::get('chamados/getchamados', ['as'=>'chamados.getchamados', 'uses'=>'ChamadosController@getChamados']);
	Route::get('equipamento/getequipamento', ['as'=>'equipamento.getequipamento', 'uses'=>'EquipamentosController@getEquipamentos']);

});	