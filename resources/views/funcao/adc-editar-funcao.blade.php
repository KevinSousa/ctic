@extends('layouts.app')
@section('content')
<div id="index" style="width: 45em;height: 30em">
	@isset($funcao)
   		<h2 id="titulo" align="left"> Editar Função </h2>
    @else
    	<h2 id="titulo" align="left"> Cadastro de Função </h2>
    @endisset
    <br>	
	@isset($funcao)
		<form method="post" action="{{route('funcao.update', $funcao->funcao_id)}}" class="ui form">
	@else
		<form method="post" action="{{route('funcao.store')}}" class="ui form">
	@endisset
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="put">
		<div class="form-group">
            <label>Digite o nome da Função:</label>
            <br>	
			<input type="text" name="funcao_name"  value="{{ isset($funcao->funcao_name) ? $funcao->funcao_name : '' }}" placeholder="Ex: Administrador" required="" class="form-control">
		</div>
		@isset($funcao)
			<button class="btn btn-success" type="submit">Editar Função</button>
       		<a href="{{route('chamados.index')}}">
        		<button class="btn btn-primary">Voltar</button>
        	</a>
		@else
		    <button class="btn btn-success" type="submit">Adicionar Função</button>
		@endisset
		</form>
</div>
@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
</style>


	