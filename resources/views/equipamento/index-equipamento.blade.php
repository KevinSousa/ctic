@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
    <title>Equipamentos</title>
	<div id="index">
		<div align="left">	
			<h1 id="titulo">Equipamentos</h1>
			<br>
            @if(session('success'))
                <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">              
                    <p>{{session('success')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('fail')?>         
              @endif
		</div>
        <table class="table table-striped table-bordered" id="example">
			<thead align="center" class="thead-light">
				<tr align="center">					
                    <th scope="col"> TOMBAMENTO </th>
					<th scope="col"> TIPO </th>
					<th scope="col"> MARCA </th>
                    <th scope="col"> AÇÃO </th>
				</tr>
			</thead>
           <tbody>
                @foreach ($equipamento as $equipamentos)
                    <tr align="center">
                        <td> {{$equipamentos->equip_tombamento}}</td>
                        @foreach ($tipoEquip as $tipo)
                            @if($equipamentos->equip_tipo == $tipo->tipo_id)
                                <td> {{$tipo->tipo_nome}}</td>
                            @endif
                        @endforeach
                        <td> {{$equipamentos->equip_marca}}</td>
                        <td> 
                                <a href="{{route('equipamento.edit',$equipamentos->equip_tombamento)}}">
                                    <i class="fas fa-edit" style="color: #E0E861;font-size: 1.5em"></i>
                                </a>    
                            <a class="destroy" href="{{route('equipamento.destroy',$equipamentos->equip_tombamento)}}"> 
                                <i class="fas fa-trash-alt" style="color: #E95B45;font-size: 1.5em"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$equipamento->links()}}
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
		<!-- DataTables JS-->
        <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>

        <script type="text/javascript"> 
            $(document).ready(function (){
                $('#vis-menu').click();
                $('#visu-equips').parent('li').addClass("active");
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
                $('.destroy').on('click', function(event)
                {
                    //pega a url
                    var url = window.location.href;
                    //explode a url
                    var result = url.split('/');
                    console.log("destruir");
                    event.preventDefault();
          
                });
            });
        </script>

@endsection
@section('ajax-js')
    
    <script> 
            $(document).ready(function (){
                $('#vis-menu').click();
                $('#visu-equips').parent('li').addClass("active");
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
         