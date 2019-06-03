<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    #titulo {
        color: #666;
    }
</style>
@section('content')
    <title>Salas</title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo">Salas</h1>
            <br>
        </div>
        <br>  
        <table class="table table-striped" id="example">
            <thead align="center" class="thead-light">
                <tr>
                    <th>IDENTIFICAÇÃO</th>
                    <th>ANDAR</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody align="center">
            @foreach ($salas as $sala)
                <tr>
                    <td data-label="Indentificacao">{{ $sala->sala_identificacao }}</td>
                    <td data-label="Andar">{{ $sala->sala_andar }}</td>
                    <td>
                        <a href="{{route('sala.editar',$sala->sala_id)}}">
                           <i class="fas fa-edit" style="color: #E0E861;font-size: 2em"></i>
                        </a>
                        <a href="{{route('sala.remover',$sala->sala_id)}}">  
                            <i class="fas fa-trash-alt" style="color: #E95B45;font-size: 2em"></i>
                        </a>
                    </td>
                </tr>
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

        
        <script> 
            $(document).ready(function (){
                @yield('datatables');
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

@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
