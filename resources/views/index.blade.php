<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<body>
	<div class="ui container">
		<h1> Cadastro de Funcionários </h1>
		<p> Formulário de cadastro dos funcionários </p>
		<div>
			<form method="post" action="{{route('user.salvar')}}" class="ui form">
				<label> Nome: </label>
				<input type="text" name="" required="">
				<label> CPF: </label>
				<input type="text" name="">
				<label> Número do SIAP: </label>
				<input type="text" name="">
				<label> Email: </label>
				<input type="text" name="">
				<label> Senha:</label>
				<input type="password" name="">
				<label> Função </label>
				<select></select><br>
				<input class="ui primary button" type="submit" name="" value="Cadastrar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
		<h1> Funcionários Cadastrados </h1>
		<p> Lista de Funcionários cadastrados </p>
		<table class="ui celled table">
			<tr>
				<th> NOME </th>
				<th> CPF </th>
				<th> SIAP </th>
				<th> FUNÇÃO </th>
				<th> AÇÃO </th>
			</tr>


			@foreach ($users as $user)
				<tr>
					<td> {{$user -> user_name}} </td>
					<td> {{$user -> user_cpf}} </td>
					<td> {{$user -> user_numero_siap}} </td>
					<td> {{$user -> funcao_name}}</td>
					<td> 
						<a href="{{route('user.remover',$user->user_id)}}">DELETAR</a>
						<a href="{{route('user.editar',$user->user_id)}}">EDITAR</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</body>
</html>