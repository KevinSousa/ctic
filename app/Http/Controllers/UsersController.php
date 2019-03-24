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

        return view ('index', compact('users'));
    	
    }	

	public function save(Request $req){}

	public function remove($id){

        DB::table('users')->where('user_id', '=', $id)->delete();
        return redirect()->route('user.home');

    }

	// public function edit($id){

 //        $usuario = Users::find($id);
 //        return view('editar', compact('usuario'));

 //    }

	public function update(Request $req, $id){}
}
