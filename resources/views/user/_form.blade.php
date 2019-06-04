	<div   class="form-row">
		<div class="form-group col-md-6">
	                        {{ csrf_field() }}
			<label for="">Nome Completo *</label>
			<input class="form-control" type="text" name="user_name" value="{{$usuario->user_name}}" required="">
		</div>
		<div class="form-group col-md-6">
			<!---Consertando conflitos aki  -->
			<label  for="">CPF *</label>

			<input class="form-control" type="text" name="user_cpf" value="{{$usuario->user_cpf}}" required="" maxlength="14" id="user_cpf">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="">Número da Matricula ou Siape *</label>
			<input class="form-control " type="text" name="user_siap_matricula" value="{{$usuario->user_siap_matricula}}" required="" maxlength="14" disabled>
		</div>

		<div class="form-group col-md-6">
			<label for="file" >Adicionar Imagem:</label><br>	
			<input type="file" name="imagem" value="icon/user/{{$usuario->user_imagem}}" id="file" >
			<img src="icon/user/{{$usuario->user_imagem}}" alt="">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="">Email *</label>
			<input class="form-control" type="email" name="user_email" value="{{$usuario->user_email}}" required="">
		</div>
		<div class="form-group col-md-6">
			<label for="">Celular *</label>
			<input class="form-control" type="text" value="{{$usuario->user_telefone}}" name="user_telefone" id="user_telefone">
		</div>
	</div>
	<div class="form-group">
		<label for="">Função*</label>

		<select name="user_funcao" class="form-control">
			@foreach($funcaos as $func)
				@if($func->funcao_id == $usuario->user_funcao)
				<option value="{{$func -> funcao_id}}" 
					@if($func->funcao_id == $usuario->user_funcao) Selected @endif;
					@if($func->funcao_id == $usuario->user_funcao) disabled @endif;
					>{{$func->funcao_name}}</option>
				@endif;			
			@endforeach
		</select>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label> Senha Antiga*</label>
			<input class="form-control" type="password" name="password" required="" maxlength="16" minlength="8">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Senha Atual*</label>	
			<input class="form-control" type="password" name="password2" maxlength="16" minlength="8">
		</div>
	</div>
