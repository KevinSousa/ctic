@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
          <div style="margin-top: 6em;">
            <h2 id="titulo" align="left"> Editar Chamado </h2>
            <br>
            @if($errors->all())
                    <ol class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endforeach
                    </ol>
                @endif 
            <form action="{{ route('chamados.update', $chamados->cham_id) }}" method="POST" class="">
              {{ csrf_field() }}
                      
              <div class="form-row">
                  <div class="form-group col-md-6">
                     @php($grau = ['BAIXO', 'MÉDIO', 'ALTA'])
                      <label>Grau de urgência</label>
                      <select name="cham_grau_urgencia" class="form-control">
                          <option hidden></option>       
                          @foreach($grau as $value) 
                              <option value="{{$value}}"
                                  @if($value == old('cham_grau_urgencia')) 
                                    Selected 
                                  @elseif($value == $chamados->cham_grau_urgencia) 
                                    Selected 
                                  @else            
                                  @endif            
                              >{{$value}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('cham_grau_urgencia')) 
                          <script >
                              $('#cham_grau_urgencia').addClass('alert-danger');
                          </script>
                      @endif
                  </div>

                  <div class="form-group col-md-6">
                      <label> Categoria do problema </label>
                      <select name="typeProblem" id="typeProblem" class="form-control">
                          <option hidden></option> 
                          @foreach ($tipos_problemas as $tipo)
                           <option
                            @foreach($sublista as $sub)
                              @if($sub->sub_id == $chamados->cham_sublista_problema)
                                @if(old('typeProblem') == $tipo->probl_id)
                                  selected 
                                @elseif($sub->sub_probl == $tipo->probl_id)
                                  selected
                                @else
                                @endif
                              @endif
                            @endforeach
                            value="{{$tipo -> probl_id}}">{{$tipo -> probl_tipo}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('typeproblem')) 
                          <script >
                              $('#typeProblem').addClass('alert-danger');
                          </script>
                      @endif
                  </div>

              </div>

              <div class="form-row">
                  <div  class="form-group col-md-6">
                      <label> Subcategoria </label>
                      <select name="cham_sublista_problema" class="form-control cham_sublista_problema" id="sublist">
                          <option disabled>Selecione uma Categoria</option>
                      </select>
                      @if ($errors->has('cham_sublista_problema')) 
                          <script >
                              $('.cham_sublista_problema').addClass('alert-danger');
                          </script>
                      @endif
                  </div>               
                  <div class="form-group col-md-6">
                      <label>Tombamento</label>
                      @if(old('cham_equip')==null)
                          <input class="form-control" type="text" value="{{$chamados -> cham_equip}}" required="" name="cham_equip" id="cham_equip" placeholder="Ex:: 9543154">               
                      @else
                          <input class="form-control" type="text" value="{{ old('cham_equip') }}" name="cham_equip" id="cham_equip" placeholder="Ex:: 9543154" required="">
                      @endif
                      @if ($errors->has('cham_equip')) 
                        <script >
                          $('#cham_equip').addClass('alert-danger');                                            
                        </script>
                      @endif
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sala*</label>
                    <select name="cham_sala" id="cham_sala" class="form-control">
                        <option hidden></option> 
                        @foreach ($salas as $sala)
                            <option value="{{$sala -> sala_id}}" 
                              @if (old('cham_sala') == $sala->sala_id)
                                  selected
                              @elseif( $chamados->cham_sala == $sala->sala_id)
                                  selected
                              @else
                              @endif
                            > {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('cham_sala')) 
                       <script >
                          $('#cham_sala').addClass('alert-danger');                                            
                       </script>
                    @endif
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label>Descrição do problema</label>
                      <textarea name="cham_descricao" id="cham_descricao" class="form-control" value="">{{ $chamados->cham_descricao }}</textarea>
                      @if ($errors->has('cham_descricao')) 
                        <script >
                          $('#cham_descricao').addClass('alert-danger');                                            
                        </script>
                      @endif
                      <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
                  </div>
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