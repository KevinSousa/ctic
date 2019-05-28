@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')


@section('content')
<title>Salas</title>
<style> 
 img{
    width: 60%;
    -webkit-transition: all 0.6s;
    -o-transition: all 0.6s;
    -moz-transition: all 0.6s;
    transition: all 0.6s;
}
 img:hover {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col h-100 p-3" style="margin: 0 auto">
            <img src="{{asset('img-02.png')}}" alt="" style="margin-top: 35%; margin-left: 12%">
        </div>
        <div class="col">
            <div style="margin-top: 30%;">
                <h2 id="titulo" align="left">Cadastro de Salas</h2>
                <br>
                <form action="{{ route('sala.salvar') }}" method="POST" class="ui form">
                    {{ csrf_field() }}
                    @component('cards/card-sala')
                    @endcomponent       
                    <button class="btn btn-success" type="submit">Adicionar</button>
                </form>
            </div>
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

        <script>
            $(document).ready( function(){
                $("#field").keyup(function(){
                    
                  if ( $("#field").val() > 10 ) {
                     event.preventDefault();
                    $("#field").val('10'); 
                 }
                    
                });
                $('#adc-menu').click();
                $('#adc-sala').parent('li').addClass("active");
            });
        </script>

@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
    .form-row{
        text-align: left;
    }
</style>