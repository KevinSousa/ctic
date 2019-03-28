<div class="field">
    <label>Identificação da Sala</label>
    <input type="text" name="sala_identificacao" value="{{ isset($sala->sala_identificacao) ? $sala->sala_identificacao : '' }}" placeholder="">
</div>
<div class="field">
    <label>Andar/Bloco</label>
    <select name="sala_andar" class="ui fluid dropdown">
        <option></option>                    
        <option value="BLOCO A">BLOCO A</option>
        <option value="BLOCO B">BLOCO B</option>
        <option value="BLOCO C">BLOCO C</option>
    </select>
</div> 