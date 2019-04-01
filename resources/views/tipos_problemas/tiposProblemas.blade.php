@extends('layouts.app')

@section('content')
	<div id="index">
		<div align="left">	
			<h1 id="titulo"> Tipos de Problemas </h1>
			<br>
		</div>
		<br>
		<table class="table table-striped">
			<thead class="thead-light">
				<tr align="center">
					<th> Nome: </th>
					<th> Ação: </th>
				</tr>
			</thead>
      <tbody>
			@foreach ($tiposProblemas as $tipoProblemas)
				<tr align="center">
					<td> {{$tipoProblemas->probl_tipo}}</td>
          <td>
              <a href="{{route('tiposProblemas.destroy',$tipoProblemas->probl_id)}}">  
                  <button id="delete" class="btn btn-danger">
                      Deletar
                  </button>
              </a>
              <a href="{{route('tiposProblemas.edit',$tipoProblemas->probl_id)}}">
                  <button id="edit" class="btn btn-warning">
                      Editar
                  </button>
              </a>
          </td>
				</tr>
			@endforeach
		</table>
		<br>
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