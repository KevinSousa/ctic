@extends('layouts.app')

@section('content')<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Acme');
	*{
		font-family: 'Acme', sans-serif;
	}
	body {
		margin-top: 25px;
		margin-bottom: 30px;
	}
</style>
<body>
	<div class="ui container">
		<h1> Cadastro de Funcao </h1>
		<h2> Formulário de cadastro dos funções </h2>
		<div>
			<form method="post" action="{{route('funcao.store')}}" class="ui form">
				{{ csrf_field() }}
				@component('cards/card-funcao', ['funcao' => $funcao])
				@endcomponent
				<input class="ui primary button" type="submit" name="" value="Cadastrar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
		<h1> Funções Cadastrados </h1>
		<p> Lista de Funções cadastrados </p>
		<table class="ui celled table">
			<tr align="center">
				<th> NOME: </th>
			</tr>
			@foreach ($funcao as $funcoes)
				<tr align="center">
					<td> {{$funcoes->funcao_name}}</td>
					<td> 
						<a href="{{route('funcao.destroy',$funcoes->funcao_id)}}"><i class="times icon"></i></a>
						<a href="{{route('funcao.edit',$funcoes->funcao_id)}}"><i class="pencil alternate icon"></i></a>
					</td>
				</tr>
			@endforeach
		</table>
		<br>
	</div>
</body>
</html>