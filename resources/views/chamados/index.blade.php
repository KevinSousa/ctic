<!DOCTYPE html>
<html>
<head>
	<title> CTIC - Chamados </title>
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
	}
</style>
<body>
	<div class="ui container">
		<h1>Chamados para Técnico</h1>
		<h2> Lista de chamados</h2>
		<div>
				<table class="ui celled table">
			<tr align="center">
				<th> Grau de urgencia</th>
				<th>Data prevista  </th>
				<th> Descrição </th>
				<th>tipo problema  </th>
				<th> Ações</th>
				
			</tr>


			@foreach ($chamados as $chamado)
				@if ($chamado == null)
				<tr align="center">
					<td> Nenhum chamado no momento </td>
				</tr>
				@endif
				<tr align="center">
				
					<td> {{$chamado -> cham_grau_urgencia}} </td>
					<td> {{$chamado -> cham_data_prevista}} </td>
					<td> {{$chamado -> cham_descricao}}</td>
					<td> {{$chamado -> cham_tipo_problema}}</td>
					<td> 
						<a href=""><i class="times icon"></i></a>
						<a href=""><i class="pencil alternate icon"></i></a>
					</td>
				</tr>
			@endforeach
		</table>
		</div>
		<a href="{{route('chamados.add')}}">Faça um chamado </a>
		
		
		<br>
	</div>
</body>
</html>