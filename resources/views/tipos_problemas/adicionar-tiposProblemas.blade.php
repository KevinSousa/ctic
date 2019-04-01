@extends('layouts.app')
@section('content')
    <title>Tipos Problemas</title>
<div id="index">
    <h2 id="titulo" align="left">Cadastro de Tipos de Problemas</h2>
    <br>
    <div align="center">
		<form method="post" action="{{route('tiposProblemas.store')}}" class="ui form">
			{{ csrf_field() }}
			@component('tipos_problemas/card-tiposProblemas')
			@endcomponent
			<button class="btn btn-success" type="submit">Adicionar</button>
		</form>
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