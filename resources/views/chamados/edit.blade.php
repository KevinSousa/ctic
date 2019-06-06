@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<style> 
 img{
    width: 60%;
    -webkit-transition: all 0.6s;
    -o-transition: all 0.6s;
    -moz-transition: all 0.6s;
    transition: all 0.6s;
}
 img:hover {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
          <div style="margin-top: 30%;">
            <h2 id="titulo" align="left"> Editar Chamado </h2>
            <br>
            <form action="{{ route('chamados.salvar') }}" method="POST" class="">
              {{ csrf_field() }}
                      
              <div class="form-row">
                  <div class="form-group col-md-6">
                     @php($grau = ['BAIXO', 'MÉDIO', 'ALTA'])
                      <label>Grau de urgência</label>
                      <select name="cham_grau_urgencia" class="form-control">
                          <option hidden></option>       
                          @foreach($grau as $value) 
                              <option value="{{$value}}"
                                  @if($value == $chamados->cham_grau_urgencia) Selected @endif            
                              >{{$value}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                      <label> Categoria do problema </label>
                      <select name="typeproblem" id="typeProblem" class="form-control">
                          <option hidden></option> 
                          @foreach ($tipos_problemas as $tipo)
                              @if($chamados->cham_sublista_problema == $tipo->probl_id)
                                  <option selected value="{{$tipo -> probl_id}}">{{$tipo -> probl_tipo}}</option>
                              @else
                                  <option value="{{$tipo -> probl_id}}">{{$tipo -> probl_tipo}}</option>    
                              @endif    
                          @endforeach
                      </select>
                  </div>

              </div>

              <div class="form-row">
                  <div  class="form-group col-md-6">
                      <label> Subcategoria </label>
                      <select name="cham_sublista_problema" class="form-control" id="sublist">
                          <option disabled>Selecione uma Categoria</option>
                          
                      </select>
                  </div>               
                  <div class="form-group col-md-6">
                      <label>Tombamento</label>
                      @if(!old('cham_equip')==null)
                          <input class="form-control alert-danger" type="text" value="{{$chamados -> cham_equip}}" required="" name="cham_equip" placeholder="Ex:: 9543154">               
                      @else
                          <input class="form-control" type="text" value="{{ old('cham_equip') }}" name="cham_equip" placeholder="Ex:: 9543154" required="">
                                
                      @endif
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sala*</label>
                    <select name="cham_sala" class="form-control">
                        <option hidden></option> 
                        @foreach ($salas as $sala)
                            @if (old('cham_sala') == $sala->sala_id)
                                <option value="{{$sala -> sala_id}}" selected> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                            @else
                                <option value="{{$sala -> sala_id}}"> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label>Descrição do problema</label>
                      <textarea name="cham_descricao" class="form-control" value="">{{ $chamados->cham_descricao }}</textarea>
                      <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
                  </div>
                  @if (!old('cham_equip') == null)
                      <div class="alert-danger alert">
                          Número de Tombamento Informado Inválido
                      </div>    
                  @endif   
              </div>
              <button class="btn btn-success" type="submit">Adicionar</button>
              <a href="{{route('chamados.index')}}"><button class="btn btn-primary">Voltar</button></a> 
            </form>
        </div>
      </div>
      <div class="col h-100 p-3" style="margin: 0 auto">
          <img src="{{asset('img-01.png')}}" alt="" style="margin-top: 35%; margin-left: 12%">
      </div>
    </div>
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
        <script src="/js/select-sublistas.js"></script>

        <script>
            $(document).ready( function(){
                $('#adc-chamado').parent('li').addClass("active");
            });
        </script>


@endsection
@section('ajax-js')
    <script src="/js/select-sublistas.js"></script>

@endsection
<style type="text/css">
    div#index{
        margin: 0px 25px 0px 25px;
    }
    h2#titulo {
        color: #666;
    }
    .form-row, .form-group{
        text-align: left;
    }
</style>