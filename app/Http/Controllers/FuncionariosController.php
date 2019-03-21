<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
    
    public function index(){

        $funcs = DB::table('funcionarios')
                    ->join('funcaos', 'func_funcao', '=' , 'funcaos.funcao_id')
                    ->select('funcionarios.*', 'funcaos.funcao_name')
                    ->get();

        return view ('index', compact('funcs'));
    	
    }	

	public function save(Request $req){}

	public function remove($id){}

	public function edit($id){}

	public function update(Request $req, $id){}

}
 