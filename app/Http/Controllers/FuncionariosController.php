<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
    
    public function index(){

    	// $funcs = Funcionario::all();
    	// return view('index', compact('funcs'));

    	// return DB::table('funcionarios')->get();

    	$funcs = DB::table('funcionarios')->get();
    	return view('index', compact([$funcs]));
    	
    }	

	// public function save(Request $req){}

	// public function remove($id){}

	// public function edit($id){}

	// public function update(Request $req, $id){}

}
 