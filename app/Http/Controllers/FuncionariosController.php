<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;

class FuncionariosController extends Controller
{
    
    public function index(){

    	$func = Funcionario::all();
    	return view('home', compact('func'));

    }	

	public function save(Request $req){}

	public function remove($id){}

	public function edit($id){}

	public function update(Request $req, $id){}

}
 