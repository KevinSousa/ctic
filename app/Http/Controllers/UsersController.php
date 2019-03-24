<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;
use App\User;

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

        return view ('index', compact('users','funcaos'));
    	
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

	public function update(Request $req, $id){}
}
