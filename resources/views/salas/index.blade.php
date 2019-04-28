    <title>Salas</title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo"> Lista de Salas Cadastradas </h1>
            <br>
        </div>
        <br>  
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Identificação</th>
                    <th>Andar</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($salas as $sala)
                <tr>
                    <td data-label="Indentificacao">{{ $sala->sala_identificacao }}</td>
                    <td data-label="Andar">{{ $sala->sala_andar }}</td>
                    <td>
                        <a href="{{route('sala.remover',$sala->sala_id)}}">  
                            <button id="delete" class="btn btn-danger">
                                Deletar
                            </button>
                        </a>
                        <a href="{{route('sala.editar',$sala->sala_id)}}">
                            <button id="edit" class="btn btn-warning">
                                Editar
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>    
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    #titulo {
        color: #666;
    }
</style>