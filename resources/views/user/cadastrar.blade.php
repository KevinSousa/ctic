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

<style type="text/css">
	
	div#index {
		margin: 0px 25px 0px 25px;
	}

	div#titulo h1{
		color: #666;
	}

</style>