@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
    <title>Equipamentos</title>
	<div id="index">
		<div align="left row">	
			<h1 id="titulo">Equipamentos</h1>
			
            @if(session('success'))
                <ol class="float-right alert alert-warning alert-dismissible fade col-md-4 show mt-2" role="alert">              
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('fail')?>         
              @endif
              @if(session('fail'))
                <ol class="float-right alert alert-danger alert-dismissible fade col-md-4 show mt-2" role="alert">              
                    {{session('fail')}}
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
                @foreach ($equipamento as $count => $equipamentos)
                    <tr id="{{ $equipamentos->equip_tombamento }}" align="center">
                        <td> {{$equipamentos->equip_tombamento}}</td>
                        @foreach ($tipoEquip as $tipo)
                            @if($equipamentos->equip_tipo == $tipo->tipo_id)
                                <td> {{$tipo->tipo_nome}}</td>
                            @endif
                        @endforeach
                        <td> {{$equipamentos->equip_marca}}</td>
                        <td> 
                            <a id="{{$count}}" href="#" class="listAJAX" url="/equipamento/edit/{{$equipamentos->equip_tombamento}}">
                                <i class="fas fa-edit" style="color: #E0E861;font-size: 1.5em"></i>
                            </a>    
                            <a  id="" class="destroy" data-catid="{{$equipamentos->equip_tombamento}}" data-toggle="modal" data-target="#delete{{$count}}"  href="#"> 
                                <i  class="fas fa-trash-alt" style="color: #E95B45;font-size: 1.5em"></i>
                            </a>
                        </td>
                    </tr>
                        <div class="modal modal-danger fade" id="delete{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Confirmação de exclusão</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                                  <div class="modal-body">
                                        <p class="text-center">
                                            Tem certeza que deseja deletar esse item ?
                                        </p>
                                        <input type="hidden" name="category_id" id="cat_id" value="">       
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Não, Cancelar</button>
                                    <a href="#" data-dismiss="modal" count="{{$count}}" url="{{$equipamentos->equip_tombamento }}" class="btn btn-warning deletar-sucesso">Sim, Deletar</a>
                                  </div>
                            </div>
                          </div>
                        </div>
                                        
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

        <!-- Main JS-->
        <script src="/js/main.js"></script>
		<!-- DataTables JS-->
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>

        <script type="text/javascript"> 
            
            $('#vis-menu').click();
            
            $(document).ready(function (){
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

                $('.deletar-sucesso').on("click", function(event)
                {
                    event.preventDefault();
                    var url = $(this).attr('url');
                    var count = $(this).attr('count');

                    console.log(url);
                    console.log(count);
                    $.ajax({
                        url: "/equipamento/destroy/"+url,
                        type: "get",
                        datatype: "html"
                    }).done(function(data){
                        $("#"+url).remove();
                        // $("#delete"+count).modal('toggle');
                        var modal = "#delete" + count;
                        $(modal+" .close").click()
                    }).fail(function(jqXHR, ajaxOptions, thrownError){
                        alert('No response from server');
                    });
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
                $('.destroy').on('click', function(event)
                {
                    //pega a url
                    var url = window.location.href;
                    //explode a url
                    var result = url.split('/');
                    console.log("destruir");
                    event.preventDefault();
          
                });

                $('.deletar-sucesso').on("click", function(event)
                {
                    event.preventDefault();
                    var url = $(this).attr('url');
                    var count = $(this).attr('count');

                    console.log(url);
                    console.log(count);
                    $.ajax({
                        url: "/equipamento/destroy/"+url,
                        type: "get",
                        datatype: "html"
                    }).done(function(data){
                        $("#"+url).remove();
                        // $("#delete"+count).modal('toggle');
                        var modal = "#delete" + count;
                        $(modal+" .close").click()
                    }).fail(function(jqXHR, ajaxOptions, thrownError){
                        alert('No response from server');
                    });
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
         