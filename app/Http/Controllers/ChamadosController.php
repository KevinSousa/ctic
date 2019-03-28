<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\ChamadosController;
class ChamadosController extends Controller
{
   public function index(){ 

        $chamados = DB::table('chamados')->get();
        return view('chamados.index', compact('chamados'));
      
    }   

    public function add(){
        return view('chamados.adicionar');
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
