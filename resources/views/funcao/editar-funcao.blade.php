@extends('layouts.app')
@section('content')
	<div class="ui container">
		<h1> Alterar Dados </h1>
		<h3> Alteração de dados do função </h3>
		<div>
			<form method="post" action="{{route('funcao.update', $funcao->funcao_id)}}" class="ui form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@component('cards/card-funcao', ['funcao' => $funcao])
				@endcomponent
				<input class="ui primary button" type="submit" name="" value="Atualizar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
	</div>
	<!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
@endsection