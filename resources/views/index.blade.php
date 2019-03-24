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
		<p> Formulário de cadastro dos funcionários </p>
		<div>
			<form method="post" action="{{route('user.salvar')}}" class="ui form">
				{{ csrf_field() }}
				<label> Nome: </label>
				<input type="text" name="user_name" required="" placeholder="Nome do Funcionário"><br><br>
				<label> CPF: </label>
				<input type="text" name="user_cpf" required="" maxlength="11" placeholder="CPF do Funcionário"><br><br>
				<label> Número do SIAPE: </label>
				<input type="text" name="user_numero_siap" required="" maxlength="7" placeholder="No máximo 7 dígitos"><br><br>
				<label> Email: </label>
				<input type="email" name="user_email" required="" placeholder="Exemplo: example@example.com"><br><br>
				<label> Senha: </label>
				<input type="password" name="user_password" required="" placeholder="No mínimo 8 caracteres"><br><br>
				<label> Função: </label>
				<select>
					<option></option>
					@foreach($funcaos as $func)
					 <option value="">{{$func -> funcao_name}}</option>
					@endforeach
				</select><br>
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
	</div>
</body>
</html>