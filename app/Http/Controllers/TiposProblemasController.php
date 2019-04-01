<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_problema;

class TiposProblemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposProblemas = Tipo_problema::all();
        return view ('tipos_problemas/tiposProblemas', compact("tiposProblemas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_problemas.adicionar-tiposProblemas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Validando os dados*/
        $validar            =   $request->validate([
            'problem_tipo'           => 'required',
        ],[ 'problem_tipo.required' => 'Preencha o nome da Função']);

        /*Atualizando todos esses itens da model*/
        $TipoProblemas                  = new Tipo_problema;
        $TipoProblemas->probl_tipo    = $request->problem_tipo;
        $TipoProblemas->save();

        $request->session()->flash('alert-success', 'Tipo de Problema cadastrado com Sucesso!');
        return redirect('/tiposProblemas');

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

        public function edit($id) {
        /*Redireciona para o View editar com todos os dados do evento selecionado*/
        $tipoProblema = Funcao::where('funcao_id','=', $id)->first();
        return view('editar-funcao', compact('funcao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
