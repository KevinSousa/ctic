<?php

namespace App\Http\Controllers;


use Yajra\DataTables\DataTables;
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
     	$equipamento = DB::table('equipamentos')->paginate(10);
        
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view ('/equipamento.index-equipamento', compact('equipamento','tipoEquip','ajax'));

    }

   //  public function getEquipamentos()
   //  {
 		// $equipamento = DB::table('equipamentos')->join('tipo_equipamentos', 'tipo_equipamentos.tipo_id', '=' , 'equip_tipo')
 		// 						  				->select('tipo_equipamentos.*','equipamentos.*');
   //      return Datatables::of($equipamento)->make();
   //  }

    public function create(Request $request){
    	$TipoEquip = Tipo_Equipamento::all();
    	
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view ('/equipamento.adc-editar-equipamento', compact('TipoEquip','ajax'));
    }
    
    public function store(Request $request) {

		/*Validando os dados*/
		$validar 			= 	$request->validate([
			'equip_tipo' => 'required',
			'equip_marca' => 'required',
			'equip_tombamento' => 'required|numeric',
		 ],['equip_tipo.required' => 'Escolha um tipo de Equipamento',
			'equip_marca.required' => 'Preencha o campo marca do Equipamento',
			'equip_tombamento.required' => 'Preencha o campo do numero de tombamento do Equipamento',
			'equip_tombamento.numeric' => 'O campo do numero de Tombamento deve conter apenas números']);

		/*Atualizando todos esses itens da model*/
		$equip = $request->all();
        Equipamento::create($equip);

		$mensagem = 'Equipamento cadastrado com Sucesso!';
		return redirect()->route('equipamento.index')
						 ->with('success',$mensagem);

	}

	public function edit(Request $request, $id) {

		/*Redireciona para o View editar com todos os dados do evento selecionado*/
		$TipoEquip = Tipo_Equipamento::all();
		$equipamento = Equipamento::where('equip_tombamento','=', $id)->first();
		 $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
		return view('equipamento/adc-editar-equipamento', compact('equipamento','TipoEquip','ajax'));

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


		$mensagem = 'Equipamento atualizado com Sucesso!';
		return redirect()->route('equipamento.index')
						 ->with('success',$mensagem);


	}
	public function gettombamento($id){
		$equip	= Equipamento::where('equip_tombamento', 'like','%'.$id.'%')->get();
		return json_encode($equip);
	}

	public function destroy($id) {

		/*Pega o item pelo id e destroi*/
		$resultado = Equipamento::find($id)->delete();
		if ($resultado == true) {
			$mensagem = "Sucesso ao deletar o item";
		}
		
		return redirect()->route('equipamento.index')->with('success',$mensagem );

	}
}
