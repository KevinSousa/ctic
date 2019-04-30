<?php

namespace App\Http\Controllers;


use App\Equipamento;
use App\Tipo_equipamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\FuncaoController;

class EquipamentosController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
    }
    
    public function index(Request $request) {
       	$tipoEquip = Tipo_Equipamento::all();
     	$equipamento = Equipamento::all();
        
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view ('/equipamento.index-equipamento', compact('equipamento','tipoEquip','ajax'));

    }

    public function create(){
    	$TipoEquip = Tipo_Equipamento::all();
    	return view('equipamento.adc-editar-equipamento', compact('TipoEquip'));
    }
    
    public function store(Request $request) {

		/*Validando os dados*/
		$validar 			= 	$request->validate([
			'equip_tipo' => 'required',
			'equip_marca' => 'required',
			'equip_tombamento' => 'required|numeric',
		 ],['equip_tipo.required' => 'Preencha o tipo de equipamento',
			'equip_marca.required' => 'Preencha a marca do equipamento',
			'equip_tombamento.required' => 'Preencha o numero de tombamento do equipamento',
			'equip_tombamento.numeric' => 'Este campo tem que ser númerico']);

		/*Atualizando todos esses itens da model*/
		$equip = $request->all();
        Equipamento::create($equip);

		$request->session()->flash('alert-success', 'Função cadastrada com Sucesso!');
		return redirect()->route('equipamento.index');

	}

	public function edit($id) {

		/*Redireciona para o View editar com todos os dados do evento selecionado*/
		$TipoEquip = Tipo_Equipamento::all();
		$equipamento = Equipamento::where('equip_tombamento','=', $id)->first();
		return view('equipamento/adc-editar-equipamento', compact('equipamento','TipoEquip'));

	}

	public function update(Request $request, $id) {

		/*Validando os dados*/
		$validar 			= 	$request->validate([
			'equip_tipo' => 'required',
			'equip_marca' => 'required',
			'equip_tombamento' => 'required|numeric',
		 ],['equip_tipo.required' => 'Preencha o tipo de equipamento',
			'equip_marca.required' => 'Preencha a marca do equipamento',
			'equip_tombamento.required' => 'Preencha o numero de tombamento do equipamento',
			'equip_tombamento.numeric' => 'Este campo tem que ser númerico']);

		/* Se o Id for igual ao id do Equipamento pega tudo*/
		$equip	= Equipamento::where('equip_tombamento','=', $id)->first();
		$equip->equip_tipo 	= $request->equip_tipo;
		$equip->equip_marca 	= $request->equip_marca;
		$equip->equip_tombamento 	= $request->equip_tombamento;
		$equip->save();

		$request->session()->flash('alert-update', 'Evento Atualizado com sucesso!');
		return redirect()->route('equipamento.index');

	}

	public function destroy($id) {

		/*Pega o item pelo id e destroi*/
		Equipamento::find($id)->delete();
		return redirect()->route('equipamento.index');

	}
}
