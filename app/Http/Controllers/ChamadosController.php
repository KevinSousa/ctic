<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Chamados;
class ChamadosController extends Controller
{
   public function index(){ 
                 
        $chamados =  DB::table('chamados')
                    ->join('users', 'users.user_id', '=' , 'cham_user')
                    ->join('salas', 'salas.sala_id', '=' , 'cham_sala')
                    ->join('tipo_problemas', 'tipo_problemas.probl_id', '=' , 'cham_tipo_problema')
                    ->select('users.user_name','chamados.*','salas.sala_identificacao','salas.sala_andar','tipo_problemas.probl_tipo','chamados.cham_id')
                    ->get();
                    return view('chamados.index', compact('chamados'));
          
    }   

    public function add(){
         $salas = DB::table('salas')->get();
        return view('chamados.adicionar', compact('salas'));
    }

    public function save(Request $req){
        $registro = $req->all();
        Chamado::create($registro);
        return redirect()->route('chamados.index');
    }

    public function remove($id){
        DB::table('salas')->where('sala_id', '=', $id)->delete();
        return redirect()->route('sala.home');        
    }

    public function edit($id){

    }

    public function update(Request $req, $id){
        
    }
}
