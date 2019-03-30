<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
        <title>Edição de chamado</title>
        <style type="text/css">
        body {
            margin-top: 25px;
            margin-bottom: 30px;
        }
    </style>
    </head>
    <body>
            <div class="ui container">
                <h1>Edite o seu chamado</h1>
                                <!---  Parte de editar chamados  -->
                <div><!---  form de chamados -->
                    <form action="{{ route('chamados.update',$chamados -> cham_id)}}" method="POST" class="ui form">
                        {{ csrf_field() }}
                        <div class="field">
                            <label>Descrição do problema</label>
                            <!---  descrição do chamado -->
                            <input type="text" name="cham_descricao" value="{{$chamados -> cham_descricao}}"  placeholder="Ex:: Problema com o Computador que se desliga">

                             <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
                        </div>
                        <!---  grau de urgencia -->
                            <label><b>Grau de urgencia<b></label>
                            <select name="cham_grau_urgencia" id="select"class="ui fluid dropdown">
                                <option value="" id="select" >  </option>                
                                <option value="BAIXO">BAIXO</option>
                                <option value="MÉDIO">MÉDIO</option>
                                <option value="ALTA">ALTA</option>
                            </select>
                        <div class="field">
                                <!---  uma categoria de problema -->
                            <label><b>Categoria do problema<b></label>
                            <select name="cham_tipo_problema" class="ui fluid dropdown">
                                 <option></option> 
                                 @foreach ($tipos_problemas as $tipo)
                                 <option value="{{$tipo -> probl_id}}">{{$tipo -> probl_tipo}}</option>
                                 @endforeach
                            </select>
                            </div>  
                               
                        <div class="field">
                                <label><b>Número de tombamento do equipamento<b></label>
                                <input type="text" name="cham_equip" value="{{$chamados -> cham_equip}}" placeholder="Ex:: 5151551529">
                        </div>
                        <div class="field">
                             <label><b>Tipo de Equipamento<b></label>
                             <select name="cham_equip" class="ui fluid dropdown">
                                  <option></option> 
                                  @foreach ($tipos_equip as $equip)
                                  <option value="{{$equip -> tipo_id}}"> {{$equip -> tipo_nome}}</option>
                                  @endforeach
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
                                <label><b>Prazo para o concerto<b></label>
                                <input type = "date" name="cham_data_prevista">   
                                </select>
                                </div>
                        </div>       
                        {{ csrf_field() }}
                        <button class="ui button green" type="submit">Adicionar</button>
                    </form>
                            <a href="{{route('chamados.index')}}" style="float: right; margin-right:5em;"><i class="ui button blue"> Voltar</i></a> 


                </div>  
        </div>    

        <!--- final -->
    </body>
</html>