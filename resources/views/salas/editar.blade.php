@extends('layouts.app')
@section('content')
    <title>Salas</title>
<div id="index">
    <h2 id="titulo" align="left">Editar Sala</h2>
    <br>
        <div>
            <form action="{{ route('sala.atualizar', $sala->sala_id) }}" method="POST" class="ui form">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @component('cards/card-sala', ['sala'=>$sala])
                @endcomponent       
               <br>
        <button class="btn btn-success" type="submit">Editar</button>
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