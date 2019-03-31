@extends('layouts.app')
@section('content')
	<div class="ui container">
		<h1> Alterar Dados </h1>
		<h3> Alteração de dados do função </h3>
		<div>
			<form method="post" action="{{route('funcao.update', $funcao->funcao_id)}}" class="ui form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@component('cards/card-funcao', ['funcao' => $funcao])
				@endcomponent
				<input class="ui primary button" type="submit" name="" value="Atualizar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
	</div>
@endsection