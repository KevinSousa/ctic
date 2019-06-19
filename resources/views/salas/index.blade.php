<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    #titulo {
        color: #666;
    }
</style>
@section('content')
    <title>Laboratórios</title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo">Laboratórios</h1>
                 @if(session('remover_sala'))
                <ol class="float-right alert alert-warning alert-dismissible fade col-md-4 show mt-2" role="alert">              
                    {{session('remover_sala')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('sucesso-excluir-sala')?>         
              @endif
            <br>
            @if(session('success'))
                <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">              
                    <p>{{session('success')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('success')?>         
            @endif
        </div>
        <table class="table table-striped table-bordered" id="example">
            <thead align="center" class="thead-light">
                <tr>
                    <th>IDENTIFICAÇÃO</th>
                    <th>ANDAR</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody align="center">
            @foreach ($salas as $count =>  $sala)
                <tr id="{{$sala->sala_id}}">
                    <td data-label="Indentificacao">{{ $sala->sala_identificacao }}</td>
                    <td data-label="Andar">{{ $sala->sala_andar }}</td>
                    <td>
                    <a id="{{$count}}" href="#" class="listAJAX" url="/sala/editar/{{$sala->sala_id}}">
                           <i class="fas fa-edit" style="color: #E0E861;font-size: 1.5em"></i>
                        </a>
                        <a href="#" class="destroy  " data-catid="{{$sala->sala_id}}" data-toggle="modal" data-toggle="modal" data-target="#delete{{$count}}">  
                            <i class="fas fa-trash-alt" style="color: #E95B45;font-size: 1.5em"></i>
                        </a>
                    </td>
                </tr>
                 <div class="modal modal-danger fade" id="delete{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel" style="margin-left: 8em;">Excluir laboratório?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                                <input type="hidden" name="category_id" id="cat_id" value="" >
                                <div class="modal-footer">
                                    <div style="margin-right: 10em;">
                                        <a href="#" data-dismiss="modal" count="{{$count}}" url="{{$sala->sala_id}}" class="btn btn-success deletar-sucesso">Sim</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
            @endforeach    
            </tbody>
        </table>
        {{$salas->links()}}
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
        
        $('#visu-sala').parent('li').addClass("active");
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
            var result = url.split('/');
            var count = $(this).attr('count');

            console.log(url);
            console.log(count);
            $.ajax({
                url: "/sala/remover/"+url,
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
                $('#visu-sala').parent('li').addClass("active");
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
                    var result = url.split('/');
                    var count = $(this).attr('count');

                    console.log(url);
                    console.log(count);
                    $.ajax({
                        url: "/sala/remover/"+url,
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

@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
