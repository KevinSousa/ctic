<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $req)
    {
        $registro = $req->all();
        Tipo_problema::create($registro);
        $req->session()->flash('alert-success', 'Tipo de Problema cadastrado com Sucesso!');
        return redirect()->route('tiposProblemas.index');
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
        $tipoProblema = Tipo_problema::where('probl_id','=', $id)->first();
        return view('tipos_problemas.editar-tiposProblema', compact('tipoProblema'));
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
        $registro = $req->except(['_token','_method']);
        $problemas = DB::table('tipo_problemas')->where('probl_id', '=', $id)->update($registro);
        return redirect()->route('tiposProblemas.index');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('tipo_problemas')->where('probl_id', '=', $id)->delete();
        return redirect()->route('tiposProblemas.index');
    }
}
