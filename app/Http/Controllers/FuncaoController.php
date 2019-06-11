<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FuncaoController;
use App\Funcao;
use Illuminate\Support\Facades\DB;

class FuncaoController extends Controller
{
	
    public function __construct(){
        $this -> middleware('auth');
    }
	public function index(Request $request) {

     	$funcao = DB::table('funcaos')->paginate(5);;
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('funcao.index-funcao', compact('funcao', 'ajax'));

    }

    public function create(Request $request){
        
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('funcao.adc-editar-funcao', compact('ajax'));
    }
    
    public function store(Request $request) {

		/*Validando os dados*/
		$validar 			= 	$request->validate([
			'funcao_name' 			=> 'required | max:30',
		],[ 
			'funcao_name.required' => 'Preencha o nome da Função',
			'funcao_name.max' => 'Digite no máximo 30 caracteres neste campo',
		]);

		/*Atualizando todos esses itens da model*/
		$funcao	 				= new Funcao;
		$funcao->funcao_name 	= $request->funcao_name;
		$funcao->save();

		$request->session()->flash('alert-success', 'Função cadastrada com Sucesso!');
		return redirect('/funcao');

	}

	public function edit(Request $request,$id) {
		$ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
		/*Redireciona para o View editar com todos os dados do evento selecionado*/
		$funcao = Funcao::where('funcao_id','=', $id)->first();
		return view('funcao/adc-editar-funcao', compact('funcao','ajax'));

	}

	public function update(Request $request, $id) {

		/*Validando os dados*/
		$validar 			= 	$request->validate([
			'funcao_name' 			=> 'required',
		],[ 'funcao_name.required' => 'Preencha o nome da Função']);

		/* Se o Id for igual ao id da Função pega tudo*/
		$funcao	= Funcao::where('funcao_id','=', $id)->first();
		$funcao->funcao_name = $request->funcao_name;
		$funcao->save();

		$request->session()->flash('alert-update', 'Evento Atualizado com sucesso!');
		return redirect('/funcao');

	}

	public function destroy($id) {

		/*Pega o item pelo id e destroi*/
		$funcao = Funcao::where('funcao_id','=',$id);
		$funcao->delete();
		return redirect('/funcao');

	}
}
