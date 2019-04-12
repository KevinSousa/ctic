@extends('layouts.app')
@section('title')
	<title> Usuários </title>
@endsection
@section('content')
	<div id="index">
		<div id="titulo">
			<h1 align="left"> Usuários Cadastrados </h1>
		</div>
		<br>
        <table id="example" class="display" style="width:100%">
		    <thead>
		        <tr>
		            <th>Nome</th>
		            <th>CPF</th>
		            <th>SIAPE</th>
		            <th>Função</th>
		            <th>Ação</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach ($users as $user)
					<tr align="center">
						<td> {{$user -> user_name}} </td>
						<td> {{$user -> user_cpf}} </td>
						<td> {{$user -> user_siap_matricula}} </td>
						<td> {{$user -> funcao_name}}</td>
						<td> 
							<a href="{{route('user.remover',$user->user_id)}}"><button class="btn btn-danger">Deletar</button></a>
							<a href="{{route('user.editar',$user->user_id)}}"><button class="btn btn-warning">Editar</button></a>
						</td>
					</tr>
				@endforeach
		    </tbody>
		</table>
		<br>
		<div>
			{{$users->links()}}
		</div>
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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<script type="text/javascript">
			$(document).ready( function (){
			    $('#example').DataTable();
			});
		</script>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	div#titulo h1{
		color: #666;
	}

</style>