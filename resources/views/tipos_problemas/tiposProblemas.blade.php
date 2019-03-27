<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Acme');
	*{
		font-family: 'Acme', sans-serif;
	}
	body {
		margin-top: 25px;
		margin-bottom: 30px;
		tipoProblemas
	}
</style>
<body>
	<div class="ui container">
		<h1> Cadastro Tipos de Problemas </h1>
		<h2> Formulário de cadastro dos Tipos de Problemas </h2>
		<div>
			<form method="post" action="{{route('tiposProblemas.store')}}" class="ui form">
				{{ csrf_field() }}
				@component('tipos_problemas/card-tiposProblemas', ['tiposProblemas' => $tiposProblemas])
				@endcomponent
				<input class="ui primary button" type="submit" name="" value="Cadastrar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
		<h1> Função tiposProblemas</h1>
		<p> Listar tipos de problemas cadastrados </p>
		<table class="ui celled table">
			<tr align="center">
				<th> NOME: </th>
			</tr>
			@foreach ($tiposProblemas as $tipoProblemas)
				<tr align="center">
					<td> {{$tipoProblemas->probl_tipo}}</td>
					<td> 
						<a href="{{route('tiposProblemas.destroy',$tipoProblemas->probl_id)}}"><i class="times icon"></i></a>
						<a href="{{route('tiposProblemas.edit',$tipoProblemas->probl_id)}}"><i class="pencil alternate icon"></i></a>
					</td>
				</tr>
			@endforeach
		</table>
		<br>
	</div>
</body>
</html>