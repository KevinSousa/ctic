	<div   class="form-row">
		<div class="form-group col">
			<label for="">Nome Completo *</label>
			<input class="form-control" type="text" name="user_name" value="{{$usuario->user_name}}" required="">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<!---Consertando conflitos aki  -->
			<label  for="">CPF *</label>
			<input class="form-control" type="text" name="user_cpf" id="user_cpf" idate="user_cpf"  value="{{$usuario->user_cpf}}" required="" maxlength="14" id="user_cpf"  data-toggle="tooltip" data-placement="top" title="Adicione um CPF Válido" disabled>
			@if ($errors->has('user_cpf')) 
                <script >
                    $('#user_cpf').addClass('alert-danger');
                </script>
            @endif
		</div>
		<div class="form-group col-md-6">
			@if(Auth::user()->user_funcao == 3)
				<label for="">Número da Matricula*</label>
			@else
				<label for="">Número da Siape *</label>
			@endif
			<input class="form-control " type="text" name="user_siap_matricula" id="user_siap_matricula" value="{{$usuario->user_siap_matricula}}" required="" maxlength="14" disabled>
            @if ($errors->has('user_siap_matricula')) 
                <script >
                    $('#user_siap_matricula').addClass('alert-danger');
                </script>
            @endif
		</div>

	</div>
	<div class="form-row">
		<div class="form-group col-md-5">
			<label for="">Adicionar Imagem</label>
			<div class="btn btn-light border " style="height:100%;width: 100%;">
                <label id="value" style='margin-top: 0.2em;'><i class="fas fa-image"></i> 
                    <spam id='spam' style="font-size: small"> Procurar uma imagem</spam>
                    <input type="file" style="border-radius: 100px;margin-top: -3em;" name="user_imagem" class="custom-file-input form-control file" id="file">
                </label> 
            </div>
		</div>
		<div class="form-group col-md-7">
			<label for="">Email *</label>
			<input class="form-control" type="email" name="user_email" id="user_email" value="{{$usuario->user_email}}" required="" disabled>
            @if ($errors->has('user_email')) 
                <script >
                    $('#user_email').addClass('alert-danger');
                </script>
            @endif
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="">Celular *</label>
			<input class="form-control" type="text" value="{{$usuario->user_telefone}}" name="user_telefone" id="user_telefone">
            @if ($errors->has('user_telefone')) 
                <script >
                    $('#user_telefone').addClass('alert-danger');
                </script>
            @endif
		</div>
		<div class="form-group col-md-6">
			<label for="">Função*</label>
			<select name="user_funcao" id="user_funcao" class="form-control">
				@foreach($funcaos as $func)
					@if($func->funcao_id == $usuario->user_funcao)
					<option value="{{$func -> funcao_id}}" 
						@if($func->funcao_id == $usuario->user_funcao) Selected @endif;
						@if($func->funcao_id == $usuario->user_funcao) disabled @endif;
						>{{$func->funcao_name}}</option>
					@endif;			
				@endforeach
			</select>
			@if ($errors->has('user_funcao')) 
                <script >
                    $('#user_funcao').addClass('alert-danger');
                </script>
            @endif
		</div>
	</div>

