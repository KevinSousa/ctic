@extends('layouts.app')
@section('content')
    <title>Salas</title>
<div id="index">
    <h2 id="titulo" align="left">Cadastro de Salas</h2>
    <br>
        <div>
            <form action="{{ route('sala.salvar') }}" method="POST" class="ui form">
                {{ csrf_field() }}
                @component('cards/card-sala')
                @endcomponent       
        <br>
        <button class="btn btn-success" type="submit">Adicionar</button>
            </form>
        </div>    
    </div>    
@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
</style>