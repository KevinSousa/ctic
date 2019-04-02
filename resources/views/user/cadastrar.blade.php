@extends('layouts.app')
@section('content')

<div id="index">
	<div id="titulo" align="left">
		<h1> Cadastrar usuário </h1>
	</div>
	<br>
	<form method="post" action="{{route('user.salvar')}}" class="">
		{{ csrf_field() }}
		@include('user._form')
		<button class="btn btn-success" type="submit"> Cadastrar </button>
	</form>
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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script>
            $(document).ready(function () { 
                var $CampoCpf = $("#cpf");
                $CampoCpf.mask('000.000.000-00', {reverse: true});
            });
        </script>

@endsection

<style type="text/css">
	
	div#index {
		margin: 0px 25px 0px 25px;
	}

	div#titulo h1{
		color: #666;
	}

</style>