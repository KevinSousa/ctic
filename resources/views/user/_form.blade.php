<div class="field">
	<h3> Nome: </h3>
	<input type="text" name="user_name" value="{{ isset($usuario->user_name) ? $usuario->user_name : ''}}" required="">
</div>
<div class="field">
	<h3> CPF: </h3>
	<input type="text" name="user_cpf" value="{{ isset($usuario->user_cpf) ? $usuario->user_cpf : ''}}" required="" maxlength="11">
</div>
<div class="field">
	<h3> Número do SIAPE: </h3>
	<input type="text" name="user_numero_siap" value="{{ isset($usuario->user_numero_siap) ? $usuario->user_numero_siap : ''}}" required="" maxlength="7">
</div>
<div class="field">
	<h3> Email: </h3>
	<input type="email" name="user_email" value="{{ isset($usuario->user_email) ? $usuario->user_email : ''}}" required="">
</div>
<div class="field">
	<h3> Função: </h3>
	<select name="user_funcao" class="ui fluid dropdown">
		<option></option>
		@foreach($funcaos as $func)
		<option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
		@endforeach
	</select>
</div>
<div class="field">
	<h3> Senha: </h3>
	<input type="password" name="user_password" required=""><br><br>
</div>