@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
    <title>Equipamentos</title>
	<div id="index">
		<div align="left">	
			<h1 id="titulo"> EQUIPAMENTOS </h1>
			<br>
		</div>
		<br>
		<table class="table table-striped">
			<thead class="thead-light">
				<tr align="center">					
					<th scope="col"> TIPO </th>
					<th scope="col"> MARCA </th>
                    <th scope="col"> TOMBAMENTO </th>
                    <th scope="col"> AÇÃO </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipamento as $equipamentos)
					<tr align="center">
						@foreach ($tipoEquip as $tipo)
							@if($equipamentos->equip_tipo == $tipo->tipo_id)
		                    	<td> {{$tipo->tipo_nome}}</td>
		                    @endif
        				@endforeach
                        <td> {{$equipamentos->equip_marca}}</td>
						<td> {{$equipamentos->equip_tombamento}}</td>
						<td> 
							<a href="{{route('equipamento.destroy',$equipamentos->equip_tombamento)}}">	
								<button id="delete" class="btn btn-danger">
									Deletar
								</button>
							</a>
							<a href="{{route('equipamento.edit',$equipamentos->equip_tombamento)}}">
								<button id="edit" class="btn btn-warning">
									Editar
								</button>
							</a>	
						</td>
					</tr>
				@endforeach
			</tbody>
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



@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	#titulo {
		color: #666;
	}
</style>