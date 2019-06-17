<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Chamado;
use App\Equipamento;
use Auth;

class ChamadosController extends Controller
{

    // public function __construct(){
    //     $this -> middleware('auth');
    // }
    
    public function index(Request $request){ 
                 
        $chamados =  DB::table('chamados')
                    ->join('users', 'users.user_id', '=' , 'cham_user')
                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
                    ->join('sublista_tipo_problemas', 'sublista_tipo_problemas.sub_id', '=' , 'cham_sublista_problema')
                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','sublista_tipo_problemas.*')
                    ->paginate(5);
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('chamados.index', compact('chamados','ajax'));
          
    }       

   //  public function getChamados()
   //  {
         // $chamados = Chamado::select(['cham_user','cham_id']);

		 // $chamados = Chamado::join('users', 'users.user_id', '=' , 'cham_user')
		 //                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
		 //                    ->join('sublista_tipo_problemas', 'sublista_tipo_problemas.sub_id', '=' , 'cham_sublista_problema')
		 //                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','sublista_tipo_problemas.*');
   //      return Datatables::of($chamados)->make();
         // echo "oi";
   //  }


    public function add(Request $request){
          $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
         $salas = DB::table('salas')->get();
         $tipos_problemas = DB::table('tipo_problemas')->get();         //Leva para view de adionar um chamado passando os dados necessários
         $tipos_equip = DB::table('tipo_equipamentos')->get();
        return view('chamados.adicionar', compact('salas','tipos_problemas','tipos_equip','ajax'));
    }

    public function save(Request $req){
       
        $senhas = $req -> validate([
            'cham_grau_urgencia' => 'required',
            'typeProblem' => 'required',
            'cham_sublista_problema' => 'required',
            'cham_equip' => 'required| numeric',
            'cham_sala' => 'required',
            'cham_descricao' => 'max:300'
        ],[
            'cham_grau_urgencia.required' => 'É obrigatório selecionar o Grau de Urgência',
            'typeProblem.required' => 'É obrigatório selecionar a Categoria do Problema',
            'cham_sublista_problema.required' => 'É obrigatório selecionar uma Subcategoria',
            'cham_equip.required' => 'É obrigatório preencher o Numero de Tombamento',
            'cham_equip.numeric' => 'Digite apenas numeros no Tombameto',
            'cham_sala.required' => 'É obrigatório selecionar uma Sala',
            'cham_descricao.max' => 'Digite menos de 300 caracteres na Descrição',
        ]);

        $validarEquip = Equipamento::find($req->cham_equip);

        if (!$validarEquip){
            return redirect()->back()->withInput()->with('equipnull','Não Existe');
        }

        $model = new Chamado;
        $model->cham_descricao = $req->get('cham_descricao'); // Dados que vem do form de adicionar chamados para salvar no banco
        $model->cham_data_chamado = $req->get('cham_data_chamado');
        $model->cham_grau_urgencia = $req->get('cham_grau_urgencia');
        $model->cham_sala = $req->get('cham_sala');
        $model->cham_equip = $req->get('cham_equip');
        $model->cham_data_prevista = date('Y-m-d', strtotime('+1 week'));  //colocando a data prevista por padrao de 1 semana desda data de envio do chamado podendo ser alterado pelo tecnico   
        $model->cham_sublista_problema = $req->get('cham_sublista_problema'); 
        $model->cham_user = Auth::id();
        $model->save();

        $mensagem = 'Chamado adicionado com Sucesso';
        return redirect()->route('chamados.index')
                         ->with('success',$mensagem); 
    }

    public function remove($id){        ///remove um chamado 
        $delete = 'sucess';
        DB::table('chamados')->where('cham_id', '=', $id)->delete();
        return redirect()->route('chamados.index' ,compact('delete'));        
    }

    public function edit(Request $request,$id){
         $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        ///manda para view de editar chamados
         $tipos_problemas = DB::table('tipo_problemas')->get();
         $tipos_equip = DB::table('tipo_equipamentos')->get();
         $salas = DB::table('salas')->get();
         $chamados = DB::table('chamados')->where('cham_id', '=', $id)->first();
         $sublista = DB::table('sublista_tipo_problemas')->get();
          
        return view('chamados.edit',compact('chamados','tipos_problemas','tipos_equip','salas','ajax','sublista'));  
    }

    public function update(Request $req, $id){          ///salva a edição  do chamado que é enviado pelo view de edit
        $senhas = $req -> validate([
            'cham_grau_urgencia' => 'required',
            'typeProblem' => 'required',
            'cham_sublista_problema' => 'required',
            'cham_equip' => 'required| numeric',
            'cham_sala' => 'required',
            'cham_descricao' => 'max:300'
        ],[
            'cham_grau_urgencia.required' => 'É obrigatório selecionar o Grau de Urgência',
            'typeProblem.required' => 'É obrigatório selecionar a Categoria do Problema',
            'cham_sublista_problema.required' => 'É obrigatório selecionar uma Subcategoria',
            'cham_equip.required' => 'É obrigatório preencher o Numero de Tombamento',
            'cham_equip.numeric' => 'Digite apenas numeros no Tombameto',
            'cham_sala.required' => 'É obrigatório selecionar uma Sala',
            'cham_descricao.max' => 'Digite menos de 300 caracteres no numero de Tombamento',
        ]);
        $dados = $req->except(['_token','_method']);
        $validarEquip = Equipamento::find($req->cham_equip);

        if (!$validarEquip){
            return redirect()->back()->withInput()->with('equipnull','Não Existe');
        }

        $model = Chamado::where('cham_id', '=' , $id)->first();
        $model->cham_descricao = $req->cham_descricao; // Dados que vem do form de adicionar chamados para salvar no banco
        $model->cham_data_chamado = $req->cham_data_chamado;
        $model->cham_grau_urgencia = $req->cham_grau_urgencia;
        $model->cham_sala = $req->cham_sala;
        $model->cham_equip = $req->cham_equip;
        $model->cham_data_prevista = date('Y-m-d', strtotime('+1 week'));  //colocando a data prevista por padrao de 1 semana desda data de envio do chamado podendo ser alterado pelo tecnico   
        $model->cham_sublista_problema = $req->cham_sublista_problema; 
        $model->save();

        $mensagem = 'Chamado editado com Sucesso';
        return redirect()->route('chamados.index')
                         ->with('success',$mensagem);
    }

    public function detalhes(Request $request, $id){      ///mostra mas detalhes do chamado difença do list normal é que abre mas ações e mostra a data de envio e data prevista para concerto
        
           $ajax = false;
         $sublista = DB::table('sublista_tipo_problemas')->get();
         $tipos_problemas = DB::table('tipo_problemas')->get();

        if ($request->ajax()){
            $ajax = true;
        }
        $chamado = DB::table('chamados')
            ->join('users', 'users.user_id', '=' , 'cham_user')
                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
                    ->join('sublista_tipo_problemas', 'sublista_tipo_problemas.sub_id', '=' , 'cham_sublista_problema')
                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','sublista_tipo_problemas.*')
                    ->where('cham_id', $id)->get();

                                        
                        return view('chamados.detalhes',compact('chamado','ajax','sublista','tipos_problemas'));    
    }
    public function status(Request $request,$id){
        $model = Chamado::where('cham_id', '=' , $id)->first();
        // $model->cham_id = $id; 
        $model->cham_status = $request->cham_status; 
        $model->save();

        $mensagem = 'Status modificado com Sucesso';
        return redirect()->route('chamados.index')
                         ->with('success',$mensagem); 
    }

}
