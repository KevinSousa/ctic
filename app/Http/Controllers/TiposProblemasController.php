<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tipo_problema;

class TiposProblemasController extends Controller
{

    
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposProblemas = DB::table('tipo_problemas')->paginate(5);
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('tipos_problemas.tiposProblemas', compact('tiposProblemas', 'ajax'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        return view('tipos_problemas.adicionar-tiposProblemas', compact('ajax'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $registro = $req->all();
        $senhas = $req -> validate([
            'probl_tipo' => 'required | max:25',
        ],[
            'probl_tipo.required' => 'É obrigatório preencher o Tipo do Problema',
            'probl_tipo.max' => 'Digite no máximo 30 caracteres neste campo',
        ]);
        $mensagem = 'Tipo de Problema cadastrado com Sucesso!';
        Tipo_problema::create($registro);
        return redirect()->route('tiposProblemas.index')
                         ->with('success',$mensagem);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function edit(REquest $request,$id) {
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }
        /*Redireciona para o View editar com todos os dados do evento selecionado*/
        $tipoProblema = Tipo_problema::where('probl_id','=', $id)->first();
        return view('tipos_problemas.editar-tiposProblema', compact('tipoProblema','ajax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $senhas = $req -> validate([
            'probl_tipo' => 'required | max:25',
        ],[
            'probl_tipo.required' => 'É obrigatório preencher o Tipo do Problema',
            'probl_tipo.max' => 'Digite no máximo 30 caracteres neste campo',
        ]);
        $registro = $req->except(['_token','_method']);
        $problemas = DB::table('tipo_problemas')->where('probl_id', '=', $id)->update($registro);
        $mensagem = 'Tipo de Problema atualizado com Sucesso!';
        return redirect()->route('tiposProblemas.index')
                         ->with('success',$mensagem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resultado = DB::table('tipo_problemas')->where('probl_id', '=', $id)->delete();
        if ($resultado == true) {
            $sucesso = 'Sucesso ao remover esse tipo de problema';
        }
        return redirect()->route('tiposProblemas.index')->with('success' , $sucesso);
    }

    public function listSublist($id)
    {
        $sublist = DB::table('sublista_tipo_problemas')->where('sub_probl','=',$id)->get();
        return $sublist;
    }
}
