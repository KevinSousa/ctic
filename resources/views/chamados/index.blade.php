@extends('layouts.app')
@section('content')	
	<div id="index">
		<div align="left">
			<h2> Lista de chamados</h2>
			<br>
			<a href="{{route('chamados.add')}}"><button class="btn btn-primary"> Abrir Chamado </button></a>
		</div><br>
		<table class="ui celled table">
			<tr align="center">
				<th> Autor </th>
				<th> Grau de Urgência </th>
				<th> Onde encontrar </th>
				<th> Descrição </th>
				<th> Tipo do Problema </th>
				<th> Ações </th>
				
			</tr>

			@foreach ($chamados as $chamado)
			
				<tr align="center">
					
							
					<td> {{$chamado -> user_name}} </td>
					<td> {{$chamado -> cham_grau_urgencia}} </td>
					<td> {{$chamado -> sala_identificacao }},{{ $chamado -> sala_andar}} </td>
					<td> {{$chamado -> cham_descricao}}</td>
					<td> {{$chamado -> probl_tipo}}</td>
					<td> 	
						<a href="{{route('chamados.detalhes',$chamado->cham_id)}}"><i class="ui primary button ">Detalhes</i></a>
						
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}
</style>