@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
	<title> Funções </title>
	<div id="index">
		<div align="left">	
			<h1 id="titulo">Funções</h1>
			<br>
		</div>
		<br>
        <table class="table table-striped table-bordered" id="example">
			<thead class="thead-light">
				<tr align="center">
					<th scope="col" style="width: 60%;"> NOME </th>
					<th scope="col"> AÇÃO </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($funcao as $funcoes)
					<tr align="center">
						<td> {{$funcoes->funcao_name}}</td>
						<td> 
							<a href="{{route('funcao.edit',$funcoes->funcao_id)}}">
								<i class="fas fa-edit" style="color: #E0E861;font-size: 1.5em"></i>
							</a>	
							<a href="{{route('funcao.destroy',$funcoes->funcao_id)}}">	
								<i class="fas fa-trash-alt" style="color: #E95B45;font-size: 1.5em"></i>
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

        <script> 
            $(document).ready(function (){
            	@section('datatables')
	            	$('#example').DataTable({ 
	                    oLanguage:{
	                        sProcessing: "Processando...",
	                        sLengthMenu: "Mostar _MENU_ registros pro página",
	                        sZeroRecords: "Nada encontrado com esse critérios",
	                        sEmptyTable: "Não há dados para serem mostrados",
	                        sLoadingRecords: "Carregando...",
	                        sInfo: "Mostrando _START_ a _END_ de _TOTAL_ registros",
	                        sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
	                        sInfoFiltered: "(filtro aplicado em _MAX_ registros)",
	                        sInfoPostFix: "",
	                        sInfoThousands: ".",
	                        sSearch: "Pesquisar:",
	                        sUrl: "",
	                            oPaginate:{
	                                sFirst: "Primeira",
	                                sPrevious: "Anterior",
	                                sNext: "Próxima",
	                                sLast: "Última",
	                            },
	                        },
	                    bPaginate: false, //Next and Previous embaixo da tabela
	                    bLengthChange: false,  //Show and entries em cima da tabela
	                    bFilter: true, //Search em cima da tabela
	                    bInfo: false,  //Showing em baixo da tabela);
	                }); 
	             @stop
	             @yield('datatables');
                $('#vis-menu').click();
                $('#visu-funcoes').parent('li').addClass("active");
            });                
        </script>


@endsection
@section('ajax-js')
    
    <script type="text/javascript">
        $(document).ready( function (){
            @yield('datatables');
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