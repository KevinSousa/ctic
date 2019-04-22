<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;
use App\User;
use App\Funcao;

class UsersController extends Controller
{

    public function index(){

        $users = DB::table('users')
                ->join('funcaos', 'user_funcao', '=' , 'funcaos.funcao_id')
                ->select('users.*', 'funcaos.funcao_name')
                ->simplePaginate(7);

        $funcaos = DB::table('funcaos')
                ->select('funcao_id', 'funcao_name')
                ->orderBy('funcao_name', 'asc')
                -> get();

        return view ('user.index', compact('users','funcaos'));
    	
    }

    public function cadastrar(){

        $funcaos = DB::table('funcaos')
            ->select('funcao_id', 'funcao_name')
            ->orderBy('funcao_name', 'asc')
            ->get();

        return view ('user.cadastro', compact('funcaos'));

    }

	public function save(Request $req){

        $dados = $req -> all();
        $cpf = $dados['user_cpf'];
        $telefone = $dados['user_telefone'];
        
        $cpf_formatado = trim($cpf);
        $cpf_formatado = str_replace(".", "", $cpf_formatado);
        $cpf_formatado = str_replace("-", "", $cpf_formatado);

        // VALIDAÇÃO DE CPF
        if(empty($cpf_formatado)) {

            return "falso";
        }
     
        $cpf_formatado = preg_match('/[0-9]/', $cpf_formatado)?$cpf_formatado:0;

        $cpf_formatado = str_pad($cpf_formatado, 11, '0', STR_PAD_LEFT);
         
        
        if (strlen($cpf_formatado) != 11) {
            return "falso";
        }
        
        else if ($cpf_formatado == '00000000000' || 
            $cpf_formatado == '11111111111' || 
            $cpf_formatado == '22222222222' || 
            $cpf_formatado == '33333333333' || 
            $cpf_formatado == '44444444444' || 
            $cpf_formatado == '55555555555' || 
            $cpf_formatado == '66666666666' || 
            $cpf_formatado == '77777777777' || 
            $cpf_formatado == '88888888888' || 
            $cpf_formatado == '99999999999') {
            return "falso";

         } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf_formatado{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf_formatado{$c} != $d) {
                    return "falso";
                }
            }
     
            User::create($dados);
                $cadastro ='sucesso';
            return redirect() -> route('login', compact('cadastro')) ;
            
        }


    }

	public function remove($id){

        DB::table('users')->where('user_id', '=', $id)->delete();
        return redirect()->route('user.home');

    }

    public function edit($id){

        $usuario = DB::table('users')->where('user_id', '=', $id)->first();
        $funcaos = Funcao::all();
        return view('user.editar',compact('usuario','funcaos'));    
    }

	public function update(Request $req, $id){

        $dados = $req->except(['_token','_method']);
        DB::table('users')
            ->where('user_id', '=' , $id)
            ->update($dados);

        return redirect() -> route('user.home');
        
    }
}
