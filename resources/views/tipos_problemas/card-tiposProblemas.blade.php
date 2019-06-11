<div class="form-group" style="display:inline;">
	<label >Nome do Tipo de Problema*</label>
	<input type="text" name="probl_tipo" id="probl_tipo" value="{{ old('probl_tipo', $tipoProblema->probl_tipo ?? '') }}" required="" placeholder="Ex: Hd" class="form-control">
	@if ($errors->has('probl_tipo')) 
        <script >
            document.getElementById('probl_tipo').style.borderColor ="red";
        </script>
    @endif
	<br>
</div>
