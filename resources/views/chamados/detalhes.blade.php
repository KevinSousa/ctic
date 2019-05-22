<!DOCTYPE html>
<html>
	<head>
		<title> CTIC - Chamados </title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			tr{
				position: center;
			}
			
			td{
				font-size: 110%;
				width: 10em;

			}
			
	        .destaque{
   			border-style: ridge;
   			font-size: 115%;
   			position: center;
	        }
		</style>
                        
                        
			<!---- DESTALHES DO CHAMADO DIFERENÇA DA LISTA É QUE DIZ O DIA DO CHAMADO E DATA PREVISTA-->
	<body>
			<div class="ui container">
				<h1>Destalhes do chamado</h1>
				<div>
						
				<table class="fixed-center  table table-hover col-md-10 border border-dark m-2" id="coluna">
			  <thead class="thead-dark">
			  	@foreach ($chamado as $chamados)
			    <tr>
			      <th class="border border-dark" scope="">Destalhes do chamado</th>
			      <th class="border border-dark" class="col-md-8" scope="col">Valores</th>
			    </tr>
			    <tbody> 
			    <tr class="hover">
			   
			      <th class="border border-dark" scope="row">Autor</th>
			      <td > {{$chamados -> user_name}} </td>
			    </tr>
			    <tr class="hover">
			      <th class="border border-dark" scope="row">Grau de urgencia</th>
			      <td> {{$chamados -> cham_grau_urgencia}} </td>
			    </tr>
			    <tr class="hover">
			      <th class="border border-dark" scope="row">Sala</th>
			      <td> {{$chamados -> sala_identificacao }} </td>
			    </tr>

			    <tr class="hover">
			      <th class="border border-dark" scope="row">Andar</th>
			      <td>{{$chamados ->  sala_andar}}</td>
			    </tr>
			    <tr class="hover" >
			      <th  class="border border-dark" scope="row">Descrição</th>
			     <td> {{$chamados -> cham_descricao}}</td>
			    </tr>
			    <tr class="hover">
			      <th class="border border-dark " scope="row">Especulação do problema</th>
			     <td> {{$chamados -> sub_nome}}</td>
			    </tr>
			     <tr class="hover">
			      <th class="border border-dark" scope="row">Data do chamado</th>
			     <td> {{$chamados -> cham_data_chamado}}</td>  
			    </tr>
			      <tr class="hover">
			      <th class="border border-dark " scope="row">Data prevista até a finalização do chamado</th>
			      <td> {{$chamados -> cham_data_prevista}}</td> 
			     </tr>
			    <tr class="hover">
			    	@endforeach
			      <th class="border border-dark" scope="row">Ações</th>
			   
			    
						    <td>
						    <a href="{{route('chamados.destroy' ,$chamados->cham_id)}}"><i class="times icon"></i></a>
							<a href="{{route('chamados.edit' ,$chamados->cham_id)}}"><i class="pencil alternate icon"></i></a>
							</td>
						</tr>
			  </thead>
			 </tbody>

			</table>
				</div>
				<a href="{{route('chamados.index')}}">Voltar</a>
				<br>
			</div>
			<script type="text/javascript">
				$(function(){
					$(".hover").hover(
					    function(){
					        $(this).addClass('destaque');
					    },
					    function(){
					        $(this).removeClass('destaque');
					    }
					    );
					});
			</script>
</body>
</html>