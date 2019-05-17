@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<title>Equipamentos</title>
<div id="index" style="width: 45em;height: 30em">
    <ol>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ol>
    @isset($equipamento)
        <h2 id="titulo" align="left"> Editar Equipamento </h2>
    @else
    	<h2 id="titulo" align="left"> Cadastro de Equipamento </h2>
    @endisset
    <br>	
	@isset($equipamento)
		<form method="post" action="{{route('equipamento.update', $equipamento->equip_tombamento)}}" class="ui form">
	@else
		<form method="post" action="{{route('equipamento.store')}}" class="ui form">
	@endisset
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="put">
		<div class="form-group">
            <label>Adicione o tipo do equipamento:</label>
            <br>	
                <select name="equip_tipo" class="form-control">
                    <option></option> 
                    @foreach ($TipoEquip as $tipo)
                        <option value="{{$tipo -> tipo_id}}"
                            @if (isset($equipamento) && $equipamento->equip_tipo == $tipo->tipo_id)
                                Selected
                            @endif>
                                {{$tipo -> tipo_nome}}
                            </option>
                    @endforeach
                </select>          
            <label>Adicione a marca do equipamento:</label>
            <br>    
            <input type="text" name="equip_marca"  value="{{ isset($equipamento->equip_marca) ? $equipamento->equip_marca : '' }}" placeholder=" Especifique a marca do equipamento" required="" class="form-control">
            <label>Adicione o numero de tombamento do equipamento:</label>
            <br>    
            <input type="text" name="equip_tombamento"  value="{{ isset($equipamento->equip_tombamento) ? $equipamento->equip_tombamento : '' }}" placeholder="Digite o numero do tombamento" required="" class="form-control">
		</div>
		@isset($equipamento)
			<button class="btn btn-success" type="submit">Editar Equipamento</button>
       		<a href="{{route('equipamento.index')}}">
        		<button class="btn btn-primary">Voltar</button>
        	</a>
		@else
		    <button class="btn btn-success" type="submit">Adicionar Equipamento</button>
		@endisset
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

        <script>
            $(document).ready( function(){
                $('#adc-menu').click();
                $('#adc-equip').parent('li').addClass("active");
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
    .form-group{
        text-align: left;
    }
</style>

	