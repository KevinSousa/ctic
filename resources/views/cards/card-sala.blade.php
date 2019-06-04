@php($bloco = ['BLOCO A','BLOCO B','BLOCO C'])
<div class="form-group">
    	<label>Numero da Sala:</label>
        <input type="text" name="sala_identificacao" value="{{ isset($sala->sala_identificacao) ? $sala->sala_identificacao : '' }}" placeholder="Ex: 5" required="" class="form-control" id="field" maxlength="2"  max="10">
	    <label>Andar/Bloco:</label>
	    <select name="sala_andar" class="form-control">
            <option disabled>Escolha o bloco onde a sala está localizada</option> 
            <option disabled>---</option> 
	        <option value="" hidden></option> 
	        @foreach ($bloco as $blocos)
                <option value="{{$blocos}}"
                    @if (isset($sala) && $sala->sala_andar == $blocos)
                        Selected
                    @endif>
                        {{$blocos}}
                    </option>
            @endforeach
    	</select>
</div>