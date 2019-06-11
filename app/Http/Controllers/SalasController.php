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

        $salas = DB::table('salas')->paginate(5);
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
        $senhas = $req -> validate([
            'sala_identificacao' => 'required| numeric| max:2',
            'sala_andar' => 'required',
        ],[
            'sala_identificacao.required' => 'É obrigatório preencher o Numero da Sala',
            'sala_identificacao.numeric' => 'Digite apenas numeros no campo numero da Sala',
            'sala_identificacao.max' => 'Digite menos de 2 caracteres no campo numero da Sala',
            'sala_andar.required' => 'É obrigatório selecionar Andar/Bloco',
        ]);
        Sala::create($registro);
        return redirect()->route('sala.home');
    }

    public function remove($id){
        DB::table('salas')->where('sala_id', '=', $id)->delete();
        return redirect()->route('sala.home');        
    }

    public function edit($id){
        $senhas = $req -> validate([
            'sala_identificacao' => 'required| numeric| max:2',
            'sala_andar' => 'required',
        ],[
            'sala_identificacao.required' => 'É obrigatório preencher o Numero da Sala',
            'sala_identificacao.numeric' => 'Digite apenas numeros no campo numero da Sala',
            'sala_identificacao.max' => 'Digite menos de 2 caracteres no campo numero da Sala',
            'sala_andar.required' => 'É obrigatório selecionar Andar/Bloco',
        ]);

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
