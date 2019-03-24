<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<body>
	<div class="ui container">
		<h1> Alterar Dados </h1>
		<p> Alteração de dados do funcionário </p>
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
	</div>
</body>
</html>