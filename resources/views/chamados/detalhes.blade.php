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
			
			td{
				font-size: 110%;
				width: 10em;
			}
		</style>
                        
                        
			<!---- DESTALHES DO CHAMADO DIFERENÇA DA LISTA É QUE DIZ O DIA DO CHAMADO E DATA PREVISTA-->
	<body>
			<div class="ui container">
				<h1>Destalhes do chamado</h1>
				<div>
						<table class="ui celled padded table">
						<tr align="center">
						<th class="single line">Autor</th>
						<th> Grau de urgencia</th>
						<th>Sala</th>
						<th>Andar</th>
						<th> Descrição </th>
						<th>tipo problema  </th>
						<th>Data do chamado</th>
						<th>Data prevista até a finalização do chamado</th>
						<th> Ações</th>
						
					</tr>
					@foreach ($chamado as $chamados)
					<!---- PEGA OS DADOS PASSADOS PELO CONTROLLER E CRIA A LISTA-->
						<tr align="center">
							
							<td > {{$chamados -> user_name}} </td>
							<td> {{$chamados -> cham_grau_urgencia}} </td>
							<td> {{$chamados -> sala_identificacao }} </td>
							<td>{{$chamados ->  sala_andar}}</td>
							<td> {{$chamados -> cham_descricao}}</td>
							<td> {{$chamados -> probl_tipo}}</td>
							<td> {{$chamados -> cham_data_chamado}}</td>
							<td> {{$chamados -> cham_data_prevista}}</td>
							<td> 	
								@endforeach
								<a href="{{route('chamados.destroy' ,$chamados->cham_id)}}"><i class="times icon"></i></a>
								<a href="{{route('chamados.edit' ,$chamados->cham_id)}}"><i class="pencil alternate icon"></i></a>
							</td>
						</tr>
					
				</table>
				</div>
				<a href="{{route('chamados.index')}}">Voltar</a>
				
				
				<br>
			</div>
</body>
</html>