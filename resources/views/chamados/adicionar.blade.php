@extends('layouts.app')
@section('content')
<div id="index">
    <h2 id="titulo" align="left"> Abertura de Chamado </h2>
    <br>
    <form action="{{ route('chamados.salvar') }}" method="POST" class="ui form">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Descrição do problema</label>
            <textarea name="cham_descricao" class="form-control"></textarea>
             <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Grau de urgência</label>
                <select name="cham_grau_urgencia" class="form-control">
                    <option></option>                    
                    <option value="BAIXO">BAIXO</option>
                    <option value="MÉDIO">MÉDIO</option>
                    <option value="ALTA">ALTA</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Categoria do problema</label>
                <select name="cham_tipo_problema" class="form-control">
                    <option></option> 
                    @foreach ($tipos_problemas as $tipo)
                        <option value="{{$tipo -> probl_id}}">{{$tipo -> probl_tipo}}</option>
                    @endforeach
                </select>
            </div>
               
            <div class="form-group col-md-6">
                <label>Número de tombamento</label>
                <input class="form-control" type="text" name="cham_equip" placeholder="Ex:: 5151551529">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Tipo de Equipamento</label>

                <select name="cham_equip" class="form-control">
                    <option></option> 
                    @foreach ($tipos_equip as $equip)
                        <option value="{{$equip -> tipo_id}}"> {{$equip -> tipo_nome}}</option>
                    @endforeach
                </select>
            </div>

            <div>        
                <label>Bloco</label>
                <select name="sala_andar" class="form-control">
                    <option></option>                    
                    <option value="BLOCO A">BLOCO A</option>
                    <option value="BLOCO B">BLOCO B</option>
                    <option value="BLOCO C">BLOCO C</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Sala</label>
                <select name="cham_sala" class="form-control">
                    <option></option> 
                    @foreach ($salas as $sala)
                        <option value="{{$sala -> sala_id}}"> {{$sala -> sala_identificacao}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="">
            <label>Prazo para o conserto</label>
            <input class="form-control" type="date" name="cham_data_prevista">   
        </div>     
        <br>
        <button class="btn btn-success" type="submit">Adicionar</button>
        <a href="{{route('chamados.index')}}"><button class="btn btn-primary">Voltar</button></a> 
    </form>
</div>
@endsection

<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
</style>