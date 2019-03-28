<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
    <title>Salas</title>
    <style type="text/css">
    body {
        margin-top: 25px;
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="ui container">
        <h1>Lista de Salas Cadastradas</h1>
        <table class="ui celled table">
            <thead>
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
                        <a href="{{ route('sala.remover',$sala->sala_id)}}"><i class="times icon"></i></a>
                        <a href="{{ route('sala.editar',$sala->sala_id)}}"><i class="pencil alternate icon"></i></a>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        <a href="{{ route('sala.adicionar') }}" class="ui button blue">Adicionar Sala</a>
    </div>    
</body>
</html>