@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')@section('content')
    <title>Tipos Problemas</title>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
            <div style="margin-top: 6em;">
                <h2 id="titulo" align="left">Editar Tipos de Problemas</h2>
                <br>
                <form method="post" action="{{route('tiposProblemas.update', $tipoProblema->probl_id)}}" class="ui form">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    @component('tipos_problemas/card-tiposProblemas', ['tipoProblema' => $tipoProblema])
                    @endcomponent
                    <button class="btn btn-success" type="submit"> Atualizar </button>

                </form>
            </div>
        </div>
        <div class="col h-100 p-3" style="margin: 0 auto; margin-top: -6em">
            <img src="{{asset('img-06.png')}}" alt="" class="icons-adc">
        </div>
    </div>    
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

@endsection

<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
</style>
