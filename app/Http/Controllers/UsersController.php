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
                ->get();

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

        return view ('user.cadastrar', compact('funcaos'));

    }

	public function save(Request $req){

        $dados = $req -> all();
        User::create($dados);
        
        return redirect() -> route('user.home');

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
