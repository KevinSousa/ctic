@extends('layouts.app')

@section('content')
	<div>
{{-- 		<div>
			<form method="post" action="{{route('funcao.store')}}">
				<div class="form-group">
					{{ csrf_field() }}
					@component('cards/card-funcao', ['funcao' => $funcao])
					@endcomponent
					<input type="text" name="" class="form-control"><br>
					<input class="btn btn-primary" type="submit" name="" value="Cadastrar">
					<input class="btn btn-primary" type="reset" name="" value="Limpar">
				</div>
			</form>
		</div> --}}
		<table class="table">
			<thead>
				<tr>
					<th scope="col"> ID </th>
					<th scope="col"> NOME </th>
					<th scope="col"> AÇÃO </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($funcao as $funcoes)
					<tr>
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