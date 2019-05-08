<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sala;

class SalasController extends Controller
{

    public function __construct(){
        $this -> middleware('auth');
    }
    
    public function index(Request $request){ 

        $salas = Sala::all();
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('salas.index', compact('salas', 'ajax'));

      
    }   

    public function add(Request $request){
        
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('salas.adicionar', compact('ajax'));
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
        $sala = DB::table('salas')->where('sala_id', '=', $id)->first();
        return view('salas.editar', compact('sala'));

    }

    public function update(Request $req, $id){

        $registro = $req->except(['_token','_method']);
        DB::table('salas')
            ->where('sala_id', '=' , $id)
            ->update($registro);
        return redirect()->route('sala.home');
    }
}
