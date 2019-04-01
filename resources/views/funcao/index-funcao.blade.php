@extends('layouts.app')

@section('content')
	<div id="index">
		<div align="left">	
			<h1 id="titulo"> Funções </h1>
			<br>
		</div>
		<br>
		<table class="table table-striped">
			<thead class="thead-light">
				<tr align="center">
					<th scope="col"> ID </th>
					<th scope="col"> NOME </th>
					<th scope="col"> AÇÃO </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($funcao as $funcoes)
					<tr align="center">
						<td> {{$funcoes->funcao_id}}</td>
						<td> {{$funcoes->funcao_name}}</td>
						<td> 
							<a href="{{route('funcao.destroy',$funcoes->funcao_id)}}">	
								<button id="delete" class="btn btn-danger">
									Deletar
								</button>
							</a>
							<a href="{{route('funcao.edit',$funcoes->funcao_id)}}">
								<button id="edit" class="btn btn-warning">
									Editar
								</button>
							</a>	
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	#titulo {
		color: #666;
	}
</style>