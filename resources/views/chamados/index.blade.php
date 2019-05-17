@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content') 
	<title> Chamados </title>
	<div id="index">
		<div align="left">
			<h1 id="titulo"> Chamados </h1>
		</div>
		<br>
        <table id="example" class="table table-striped" style="width:100%">
		    <thead>
		        <tr>
		            <th>Autor</th>
		            <th>Grau de Urgência</th>
		            <th>Laboratório</th>
		            <th>Andar</th>
                    <th>Tipo do Problema</th>
		            <th>Status</th>
		            <th>Ações</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($chamados as $chamado)
					<tr align="center">
						<td> {{$chamado -> user_name}} </td>
						<td> {{$chamado -> cham_grau_urgencia}} </td>
						<td> {{$chamado -> sala_identificacao }}</td>
						<td> {{$chamado -> sala_andar}}</td>
                        <td> {{$chamado -> sub_nome}}</td>
						<td> {{$chamado -> cham_status}}</td>
						<td> 	
						<a href="{{route('chamados.detalhes',$chamado->cham_id)}}"><i class="ui primary button ">Detalhes</i></a>
					</td>
					</tr>
				@endforeach
		    </tbody>
		</table>
		<br>
		{{$chamados->links()}}
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

        <script type="text/javascript">
            $(document).ready( function (){
                $('#example').DataTable();
                $('#vis-menu').click();
                $('#visu-chamados').parent('li').addClass("active");
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