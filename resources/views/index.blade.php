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
				{{ csrf_field() }}
				<label> Nome: </label>
				<input type="text" name="user_name" required="">
				<label> CPF: </label>
				<input type="text" name="user_cpf" required="" maxlength="11">
				<label> Número do SIAPE: </label>
				<input type="text" name="user_numero_siap" required="" maxlength="7">
				<label> Email: </label>
				<input type="email" name="user_email" required="">
				<label> Senha: </label>
				<input type="password" name="user_password" required="">
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