<!DOCTYPE html>
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
		<h1> Cadastro de Funcionários </h1>
		<h2> Formulário de cadastro dos funcionários </h2>
		<div>
			<form method="post" action="{{route('user.salvar')}}" class="ui form">
				{{ csrf_field() }}
				@include('user._form')
				<input class="ui primary button" type="submit" name="" value="Cadastrar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
		<h1> Funcionários Cadastrados </h1>
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
		</table>
		<br>
	</div>
</body>
</html>