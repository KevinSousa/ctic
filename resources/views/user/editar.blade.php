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
		<h1> Alterar Dados </h1>
		<p> Alteração de dados do funcionário </p>
		<div>
			<form method="post" action="{{route('user.atualizar', $usuario->user_id) }}" class="ui form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				<label> Nome: </label>
				<input type="text" name="user_name" value="{{ isset($usuario->user_name) ? $usuario->user_name : ''}}" required="">
				<label> CPF: </label>
				<input type="text" name="user_cpf" value="{{ isset($usuario->user_cpf) ? $usuario->user_cpf : ''}}" required="" maxlength="11">
				<label> Número do SIAPE: </label>
				<input type="text" name="user_numero_siap" value="{{ isset($usuario->user_numero_siap) ? $usuario->user_numero_siap : ''}}" required="" maxlength="7">
				<label> Email: </label>
				<input type="email" name="user_email" value="{{ isset($usuario->user_email) ? $usuario->user_email : ''}}" required="">
				<label> Senha: </label>
				<input type="password" name="user_password" required="">
				<label> Função: </label>
				<select name="user_funcao">
					<option></option>
					@foreach($funcaos as $func)
					 <option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
					@endforeach
				</select><br>
				<input class="ui primary button" type="submit" name="" value="Atualizar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
	</div>
</body>
</html>