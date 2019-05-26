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
            <h1 id="titulo"> Lista de Salas Cadastradas </h1>
            <br>
        </div>
        <br>  
        <table class="table table-striped" id="example">
            <thead class="thead-light">
                <tr>
                    <th>Identificação</th>
                    <th>Andar</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($salas as $sala)
                <tr>
                    <td data-label="Indentificacao">{{ $sala->sala_identificacao }}</td>
                    <td data-label="Andar">{{ $sala->sala_andar }}</td>
                    <td>
                        <a href="{{route('sala.remover',$sala->sala_id)}}">  
                            <button id="delete" class="btn btn-danger">
                                Deletar
                            </button>
                        </a>
                        <a href="{{route('sala.editar',$sala->sala_id)}}">
                            <button id="edit" class="btn btn-warning">
                                Editar
                            </button>
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
        
        <script> 
            $(document).ready(function (){
                $('#example').DataTable();
                $('#vis-menu').click();
                $('#visu-sala').parent('li').addClass("active");
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

@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
