@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<style type="text/css">
	        .destaque{
   			border-style: ridge;
   			font-size: 115%;
   			position: center;
	        }
		</style>
                        
                        
			<!---- DESTALHES DO CHAMADO DIFERENÇA DA LISTA É QUE DIZ O DIA DO CHAMADO E DATA PREVISTA-->

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
			@endsection

@section('js')
     <!-- Jquery JS-->
        <script src="/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="/vendor/slick/slick.min.js">
        </script>
        <script src="/vendor/wow/wow.min.js"></script>
        <script src="/vendor/animsition/animsition.min.js"></script>
        <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="/vendor/select2/select2.min.js">
        </script>
        <!-- Main JS-->
        <script src="/js/main.js"></script>
        <script src="/js/select-sublistas.js"></script>

        <script>
            $(document).ready( function(){
                $('#adc-chamado').parent('li').addClass("active");
            });
        </script>


@endsection
@section('ajax-js')
    <script src="/js/select-sublistas.js"></script>

@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }

    .form-row, .form-group{
        text-align: left;
    }

</style>