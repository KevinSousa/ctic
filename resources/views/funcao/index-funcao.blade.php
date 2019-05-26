@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
	<title> Funções </title>
	<div id="index">
		<div align="left">	
			<h1 id="titulo"> Funções </h1>
			<br>
		</div>
		<br>
		<table class="table table-striped" id="example">
			<thead class="thead-light">
				<tr align="center">
					<th scope="col"> ID </th>
					<th scope="col"> NOME </th>
					<th scope="col"> AÇÃO </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($funcao as $funcoes)
					<tr align="center">
						<td> {{$funcoes->funcao_id}}</td>
						<td> {{$funcoes->funcao_name}}</td>
						<td> 
							<a href="{{route('funcao.destroy',$funcoes->funcao_id)}}">	
								<button id="delete" class="btn btn-danger">
									Deletar
								</button>
							</a>
							<a href="{{route('funcao.edit',$funcoes->funcao_id)}}">
								<button id="edit" class="btn btn-warning">
									Editar
								</button>
							</a>	
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$funcao->links()}}
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

        <script> 
            $(document).ready(function (){
            	$('#example').DataTable();
                $('#vis-menu').click();
                $('#visu-funcoes').parent('li').addClass("active");
            });                
        </script>


@endsection
@section('ajax-js')
    
    <script type="text/javascript">
        $(document).ready( function (){
            $('#example').DataTable();
        });
    </script>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	#titulo {
		color: #666;
	}
</style>