@php($bloco = ['BLOCO A','BLOCO B','BLOCO C'])
<div class="form-group">
	<label>Numero da Sala*</label>
    <!-- @if ($errors->has('sala_identificacao'))
        <p style="margin-left:1em;color:red;font-size:small">{{$errors->first('sala_identificacao')}}</p>
    @endif -->
    <input type="text" name="sala_identificacao" id="sala_identificacao" value="{{ old('sala_identificacao',$sala->sala_identificacao ?? '') }}" placeholder="Ex: 5" required="" class="form-control" id="field" maxlength="2"  max="10">
    @if ($errors->has('sala_identificacao')) 
        <script >
            $('#sala_identificacao').addClass('alert-danger');                                            
        </script>
    @endif
    <label>Andar/Bloco*</label>
    <!-- @if ($errors->has('sala_andar'))
        <p style="margin-left:1em;color:red;font-size:small">{{$errors->first('sala_andar')}}</p>
    @endif --> 
    <select name="sala_andar" id="sala_andar" class="form-control">
        <option disabled>Escolha o bloco onde a sala está localizada</option> 
        <option disabled>---</option> 
        <option value="" hidden></option> 
        @foreach ($bloco as $blocos)
            <option value="{{$blocos}}"
                @if (old('sala_andar') == $blocos or !empty($sala->sala_andar) == $blocos)
                    Selected
                @endif>
                    {{$blocos}}
                </option>
        @endforeach
	</select>
    @if ($errors->has('sala_andar')) 
        <script >
            $('#sala_andar').addClass('alert-danger');                                            
        </script>
    @endif
</div>

