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
        <h1>Editar Sala</h1>
        <div>
            <form action="{{ route('sala.atualizar', $sala->sala_id) }}" method="POST" class="ui form">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @component('cards/card-sala', ['sala'=>$sala])
                @endcomponent       
                <button class="ui button green" type="submit">Editar</button>
            </form>
        </div>    
    </div>    
</body>
</html>