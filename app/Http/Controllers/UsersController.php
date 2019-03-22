<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

	public function remove($id){}

	public function edit($id){}

	public function update(Request $req, $id){}
}
