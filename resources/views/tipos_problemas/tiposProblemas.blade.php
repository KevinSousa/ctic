<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	#titulo {
		color: #666;
	}
</style>
@section('content')
    <title> Tipos de Problemas </title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo">Tipos de Problemas</h1>
            <br>
        </div>
        <br>
        <table class="table table-striped table-bordered" id="example">
            <thead class="thead-light">
                <tr align="center">
                    <th scope="col" style="width: 60%;">NOME</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposProblemas as $tipoProblemas)
                    <tr align="center">
                        <td> {{$tipoProblemas->probl_tipo}}</td>
                        <td>
                          <a href="{{route('tiposProblemas.edit',$tipoProblemas->probl_id)}}">
                            <i class="fas fa-edit" style="color: #E0E861;font-size: 1.5em"></i>
                          </a>
                          <a href="{{route('tiposProblemas.destroy',$tipoProblemas->probl_id)}}">  
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
                @yield('datatables')
                $('#vis-menu').click();
                $('#visu-tipo-problemas').parent('li').addClass("active");
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