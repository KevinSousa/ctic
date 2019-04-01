@extends('layouts.app')
@section('content')
    <title>Tipos Problemas</title>
<div id="index">
    <h2 id="titulo" align="left">Editar Tipos de Problemas</h2>
    <br>
    <div align="center">
			<form method="post" action="{{route('tiposProblemas.update', $tipoProblema->probl_id)}}" class="ui form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@component('tipos_problemas/card-tiposProblemas', ['tipoProblema' => $tipoProblema])
				@endcomponent
				<button class="btn btn-success" type="submit"> Atualizar </button>
			</form>
		</div>
</div>
@endsection