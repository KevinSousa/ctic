<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sala;

class SalasController extends Controller
{
    public function index(){ 

        $salas = Sala::all();
        return view('salas.index', compact('salas'));
      
    }   

    public function add(){
        return view('salas.adicionar');
    }

    public function save(Request $req){
        $registro = $req->all();
        Sala::create($registro);
        return redirect()->route('sala.home');
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
