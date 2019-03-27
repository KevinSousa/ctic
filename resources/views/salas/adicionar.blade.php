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
        <h1>Cadastro de Salas</h1>
        <div>
            <form action="{{ route('sala.salvar') }}" method="POST" class="ui form">
                {{ csrf_field() }}
                <div class="field">
                    <label>Identificação da Sala</label>
                    <input type="text" name="sala_identificacao" placeholder="">
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
                <button class="ui button blue" type="submit">Adicionar</button>
            </form>
        </div>    
    </div>    
</body>
</html>