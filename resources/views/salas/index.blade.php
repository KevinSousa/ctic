<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Descrição</th>
            <th>Andar</th>
        </tr>
        @foreach ($salas as $sala)
            <tr>
                <td>{{ $sala->sala_identificacao }}</td>
                <td>{{ $sala->sala_andar }}</td>
            </tr>
        @endforeach    
    </table>
</body>
</html>