@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')

                        
                        
<!---- DESTALHES DO CHAMADO DIFERENÇA DA LISTA É QUE DIZ O DIA DO CHAMADO E DATA PREVISTA-->

<h2 id="titulo">Detalhes do chamado</h2>
<br>
<div>
	<table class="fixed-center  table table-hover col-md-10 border border-dark " id="coluna">
	  	@foreach ($chamado as $chamados)
		  	<thead class="thead-dark">
			    <tr>
			     	<th class="border border-dark" scope="">Detalhes do chamado</th>
			      	<th class="border border-dark" class="col-md-8" scope="col">Valores</th>
			    </tr>
			</thead>
		    <tbody> 
			    <tr class="hover">
			      <th class="border border-dark" scope="row">Autor</th>
			      <td class="border border-dark"> {{$chamados -> user_name}} </td>
			    </tr>
			    <tr class="hover">
			     	<th class="border border-dark" scope="row">Grau de urgência</th>
			     	<td class="border border-dark"> {{$chamados -> cham_grau_urgencia}} </td>
			    </tr>
			    <tr class="hover">
			    	<th class="border border-dark" scope="row">Laboratório</th>
			    	<td class="border border-dark"> {{substr($chamados -> sala_andar, -1)}} - {{$chamados -> sala_identificacao}} </td>
			    </tr>			    
			    <tr class="hover">
			    	<th class="border border-dark" scope="row">Nome e Tombamento do Equipamento</th>
			    	<td class="border border-dark">{{$chamados->tipo_nome}} / {{$chamados -> equip_tombamento}}</td>
			    </tr>
			    <tr class="hover" >
			     	<th  class="border border-dark" scope="row">Descrição</th>
			     	<td class="border border-dark"> {{$chamados -> cham_descricao}}</td>
			    </tr>
			    <tr class="hover">
			    	<th class="border border-dark " scope="row">Tipo do problema</th>
			   		<td class="border border-dark">
				   		@foreach($tipos_problemas as $tipo)
					   		@foreach($sublista as $sub)
		                      @if($sub->sub_id == $chamados->cham_sublista_problema)
		                        @if($sub->sub_probl == $tipo->probl_id)
		                          {{$tipo->probl_tipo}}
		                        @endif
		                      @endif
		                    @endforeach
	                    @endforeach
			   		</td>
			    </tr>
			    <tr class="hover">
			    	<th class="border border-dark " scope="row">Especulação do problema</th>
			   		<td class="border border-dark"> {{$chamados -> sub_nome}}</td>
			    </tr>
			    <tr class="hover">
			    	<th class="border border-dark" scope="row">Data e Hora do chamado</th>
			     	<td class="border border-dark"> {{date("d-m-Y H:i", strtotime($chamados -> cham_data_chamado))}}</td> 
			    </tr>
					<tr class="hover">
				@if(Auth::user()->user_id == $chamados->cham_user)
				      	<th class="border border-dark" scope="row">Ações</th>
				      	<td class="border border-dark">
							@if($chamados->cham_obj != false)
					      		<a href="/chamados/add3d/{{$chamados->cham_obj}}+{{$chamados->cham_sala}}"><i class="fas fa-cube"></i>
					      			Ver no mapa
					      		</a>
					      	@endif
			    	
						    <a style="font-size: 1.5em; color: #25d881;" href="{{route('chamados.edit' ,$chamados->cham_id)}}"><i class="fas fa-edit"></i></a>
							<a style="font-size: 1.5em; color:  #E95B45;" href="{{route('chamados.destroy' ,$chamados->cham_id)}}"><i class="fas fa-trash-alt"></i></a>
						</td>					
				@else
			   	@endif
			   			</td>
			   	</tr>
	 		</tbody>
		@endforeach
	</table>
</div>
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