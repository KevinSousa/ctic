@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content') 
    <title> Chamados </title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo">Chamados</h1>
            <br>
        </div>
        <br>
        <table class="table table-condensed" id="example">
            <thead class="thead-light">
                <tr align="center">
                    <th scope="col">AUTOR</th>
                    <th scope="col">GRAU DE URGÊNCIA</th>
                    <th scope="col">TIPO DO PROBLEMA</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
        </table>
        <br>
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
            $(document).ready( function (){
                $('#vis-menu').click();
                $('#visu-chamados').parent('li').addClass("active");

                // Datatable
                $('#example').DataTable({
                    bProcessing: true,
                    deferRender: true,
                    serverSide: true,
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
                    // bPaginate: false, //Next and Previous embaixo da tabela
                    // bLengthChange: false,  //Show and entries em cima da tabela
                    // bFilter: true, //Search em cima da tabela
                    // bInfo: false,  //Showing em baixo da tabela
                    ajax: "{{ route('chamados.getchamados')}}",
                    columns: [
                            {data:'user_name'},
                            {data:'cham_grau_urgencia'},
                            {data:'sub_nome'},
                            {data:'cham_status'},
                            {data:'cham_user'},
                        ],
                    pageLength: 10,
                    sScrollx: '100%',
                    sScrollxInner: '100%',
                    aaSorting: [[0,'asc']],
                }); 
            });
        </script>
        

@endsection
@section('ajax-js')
    

@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    #titulo {
        color: #666;
    }
</style>