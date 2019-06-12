<div class="form-group" style="display:inline;">
	<label >Nome do Tipo de Problema*</label>
	@if ($errors->has('probl_tipo'))
	    <p style="margin-left:1em;color:red;font-size:small">{{$errors->first('probl_tipo')}}</p>
	@endif 
	<input type="text" name="probl_tipo" id="probl_tipo" value="{{ old('probl_tipo', $tipoProblema->probl_tipo ?? '') }}" required="" placeholder="Ex: Hd" class="form-control">
	@if ($errors->has('probl_tipo')) 
        <script >
            $('#probl_tipo').addClass('alert-danger');                                            
        </script>
    @endif
	<br>
</div>
