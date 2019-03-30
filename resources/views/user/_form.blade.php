<div class="form-group">
    <label for="">Nome Completo</label>
    <input class="form-control" type="text" name="user_name" value="{{ isset($usuario->user_name) ? $usuario->user_name : ''}}" required="">
 </div>

 <div class="form-group">
 	<label for="">CPF</label>
 	<input class="form-control" type="text" name="user_cpf" value="{{ isset($usuario->user_cpf) ? $usuario->user_cpf : ''}}" required="" maxlength="11">
 </div>

 <div class="form-group">
 	<label for="">Número do SIAPE </label>
 	<input class="form-control" type="text" name="user_numero_siap" value="{{ isset($usuario->user_numero_siap) ? $usuario->user_numero_siap : ''}}" required="" maxlength="7">
 </div>

 <div class="form-group">
 	<label for="">Email</label>
 	<input class="form-control" type="email" name="user_email" value="{{ isset($usuario->user_email) ? $usuario->user_email : ''}}" required="">
 </div>

<div class="form-group">
	<label for="">Função</label>

	<select name="user_funcao" class="form-control">
		<option></option>
		@foreach($funcaos as $func)
		<option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label> Senha </label>
	<input class="form-control" type="password" name="user_password" required="">
</div>