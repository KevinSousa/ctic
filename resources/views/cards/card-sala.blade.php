<div class="form-row">
	<div class="col">	
    	<label>Identificação da Sala</label>
    	<input type="text" name="sala_identificacao" value="{{ isset($sala->sala_identificacao) ? $sala->sala_identificacao : '' }}" placeholder="" required="" class="form-control">
	</div>
    <div class="col">	
	    <label>Andar/Bloco</label>
	    <select name="sala_andar" class="form-control">
	        <option value=""></option> 
	        <option value="BLOCO A">BLOCO A</option>
        	<option value="BLOCO B">BLOCO B</option>
        	<option value="BLOCO C">BLOCO C</option>
    	</select>
    </div>   
</div>