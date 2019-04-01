@extends('layouts.app')
@section('content')
	<div id="index">
		<div id="titulo">
			<h1 align="left"> Usuários Cadastrados </h1>
		</div>
		<br>
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
						<a href="{{route('user.remover',$user->user_id)}}"><button class="btn btn-danger">Deletar</button></a>
						<a href="{{route('user.editar',$user->user_id)}}"><button class="btn btn-warning">Editar</button></a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	div#titulo h1{
		color: #666;
	}

</style>