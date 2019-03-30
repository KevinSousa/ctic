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
			<a  class="ui primary button " href="{{route('chamados.add')}}">Faça um chamado </a>
		
				<table class="ui celled table">
			<tr align="center">
				<th>Autor</th>
				<th> Grau de urgencia</th>
				<th>Onde encontrar  </th>
				<th> Descrição </th>
				<th>tipo problema  </th>
				<th>Ações</th>
				
			</tr>

			@foreach ($chamados as $chamado)
			
				<tr align="center">
					
							
					<td> {{$chamado -> user_name}} </td>
					<td> {{$chamado -> cham_grau_urgencia}} </td>
					<td> {{$chamado -> sala_identificacao }},{{ $chamado -> sala_andar}} </td>
					<td> {{$chamado -> cham_descricao}}</td>
					<td> {{$chamado -> probl_tipo}}</td>
					<td> 	
						<a href="{{route('chamados.detalhes',$chamado->cham_id)}}"><i class="ui primary button ">Detalhes</i></a>
						
					</td>
				</tr>
			@endforeach
		</table>
		</div>
		
		
		<br>
	</div>
</body>
</html>