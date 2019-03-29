<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
    <title>Faça um chamado</title>
    <style type="text/css">
    body {
        margin-top: 25px;
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="ui container">
        <h1>Cadastre seu chamado</h1>
       
        <div>
            <form action="{{ route('chamados.salvar') }}" method="POST" class="ui form">
                {{ csrf_field() }}
                <div class="field">
                    <label>IDescrição do problema</label>
                    <input type="text" name="cham_descricao" placeholder="Ex:: Problema com o Computador que se desliga">
                     <input type="hidden"  class="cham_data_chamado" value="{{date('Y-m-d H:i:s')}}">
                </div>
                     <label><b>Grau de urgencia<b></label>
                    <select name="cham_grau_urgencia" class="ui fluid dropdown">
                        <option></option>                    
                        <option value="BAIXO">BAIXO</option>
                        <option value="MÉDIO">MÉDIO</option>
                        <option value="ALTA">ALTA</option>
                    </select>

                    <div class="field">
                         <label><b>Sala<b></label>
                    <select name="cham_sala" class="ui fluid dropdown">
                        <option></option>   
                        @foreach ($salas as $sala)
                        <option value="{{$sala -> sala_id}}"> {{$sala -> sala_identificacao}}</option>
                         @endforeach
                    </select>
                    </div>
                    <div class="field">
                        <label><b>Número de tombamento do equipamento<b></label>
                        <input type="text" name="cham_equip" placeholder="Ex:: 5151551529">
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
                <button class="ui button green" type="submit">Adicionar</button>
            </form>
              <a href="{{route('chamados.index')}}" style="float: right; margin-right:5em;"><i class="ui button blue"> Voltar</i></a> 
        </div>  

    </div>    

</body>
</html>