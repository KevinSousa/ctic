<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Chamado;

class ChamadosController extends Controller
{
   public function index(){ 
                 
        $chamados =  DB::table('chamados')
                    ->join('users', 'users.user_id', '=' , 'cham_user')
                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
                    ->join('tipo_problemas', 'tipo_problemas.probl_id', '=' , 'cham_tipo_problema')
                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','tipo_problemas.*')
                    ->get();
                    return view('chamados.index', compact('chamados'));
          
    }       //manda pro index de chamados passando os valores da lista



    public function add(){
         $salas = DB::table('salas')->get();
         $tipos_problemas = DB::table('tipo_problemas')->get();         //Leva para view de adionar um chamado passando os dados necessários
         $tipos_equip = DB::table('tipo_equipamentos')->get();
        return view('chamados.adicionar', compact('salas','tipos_problemas','tipos_equip'));
    }

    public function save(Request $req){
      
        $model = new Chamado;
        $model->cham_descricao = $req->get('cham_descricao'); // Dados que vem do form de adicionar chamados para salvar no banco
        $model->cham_data_chamado = $req->get('cham_data_chamado');
        $model->cham_grau_urgencia = $req->get('cham_grau_urgencia');
        $model->cham_sala = $req->get('cham_sala');
        $model->cham_equip = $req->get('cham_equip');
        $model->cham_data_prevista = date('Y-m-d', strtotime('+1 week'));  //colocando a data prevista por padrao de 1 semana desda data de envio do chamado podendo ser alterado pelo tecnico   
        $model->cham_tipo_problema = $req->get('cham_tipo_problema'); 
        $model->cham_user = 1;                 
        $model->save();

        return redirect()->route('chamados.index'); 
    }

    public function remove($id){        ///remove um chamado 
        $delete = 'sucess';
        DB::table('chamados')->where('cham_id', '=', $id)->delete();
        return redirect()->route('chamados.index' ,compact('delete'));        
    }

    public function edit($id){
        ///manda para view de editar chamados
         $tipos_problemas = DB::table('tipo_problemas')->get();
         $tipos_equip = DB::table('tipo_equipamentos')->get();
         $salas = DB::table('salas')->get();
          $chamados = DB::table('chamados')->where('cham_id', '=', $id)->first();
        return view('chamados.edit',compact('chamados','tipos_problemas','tipos_equip','salas'));  
    }

    public function update(Request $req, $id){          ///salva a edição  do chamado que é enviado pelo view de edit
        $dados = $req->except(['_token','_method']);
        DB::table('chamados')
            ->where('cham_id', '=' , $id)
            ->update($dados);
    }

    public function detalhes($id){      ///mostra mas detalhes do chamado difença do list normal é que abre mas ações e mostra a data de envio e data prevista para concerto
        $chamado = DB::table('chamados')
            ->join('users', 'users.user_id', '=' , 'cham_user')
                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
                    ->join('tipo_problemas', 'tipo_problemas.probl_id', '=' , 'cham_tipo_problema')
                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','tipo_problemas.*')
                    ->where('cham_id', $id)->get();
                        return view('chamados.detalhes',compact('chamado'));    
    }
}
