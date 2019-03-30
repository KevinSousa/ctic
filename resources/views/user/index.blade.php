@extends('layouts.app')
@section('content')
	<div id="index">
		<div>
			<form method="post" action="{{route('user.salvar')}}" class="">
				{{ csrf_field() }}
				@include('user._form')
				<button class="btn btn-success" type="submit"> Cadastrar </button>
			</form>
		</div>
{{-- 		<h1> Funcionários Cadastrados </h1>
		<p> Lista de Funcionários cadastrados </p>
		<table class="ui celled table">
			<tr align="center">
				<th> NOME </th>
				<th> CPF </th>
				<th> SIAP </th>
				<th> FUNÇÃO </th>
				<th> AÇÃO </th>
			</tr>


			@foreach ($users as $user)
				<tr align="center">
					<td> {{$user -> user_name}} </td>
					<td> {{$user -> user_cpf}} </td>
					<td> {{$user -> user_numero_siap}} </td>
					<td> {{$user -> funcao_name}}</td>
					<td> 
						<a href="{{route('user.remover',$user->user_id)}}"><i class="times icon"></i></a>
						<a href="{{route('user.editar',$user->user_id)}}"><i class="pencil alternate icon"></i></a>
					</td>
				</tr>
			@endforeach
		</table> --}}
	</div>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	button {
		margin-bottom: 40px;
	}
</style>