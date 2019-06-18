@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')

  <script src="/js/babylon.js"></script>
  <script src="/js/babylonjs.loaders.js"></script>
  <script src="/js/jquery-2.2.4.min.js"></script>
  <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<body>

      <div class="modal" id="exemplomodal" tabindex="-1" role="dialog"  data-backdrop="static" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gridSystemModalLabel">Para continuar com o chamado selecione o laboratório que está o equipamento</h4>
                </div>
                <div class="modal-body">
                  <h4>1 -Selecione o laboratório <button id="b10" value="b10" class="m-2"><i class="fas fa-home "></i> LABORATÓRIO B10</button><button class="m-2" value="b2" id="b2"><i class="fas fa-home"></i> LABORATÓRIO B2</button></br> </h4></br>
                 <span id="info2"> 2 - <i class="fas fa-arrows-alt"></i> Navegue na sala utilizando o mouse e as setas do teclado </br></span></br>
                  <span id="info3"> 3 - <i class="fas fa-mouse-pointer"></i> Clique com o mouse no equipamento que está apresentando o problema, e siga com as instruções, se o equipamento não estiver no mapa clique em algo que possa referenciá-lo </br> </span></br>
                  <span id="info4"> 4 - <i class="fas fa-mouse-pointer"></i> Recomendamos a navegação pressionando o botão Scroll do mouse</br> </span>
             
                </div>
        
            </div>
      </div>
    </div>
      
                
    <div id="teste">
        <button id='reverter' class="btn-info ml-10" style="position: center; position: fixed; margin-top: -2em;">Escolher outro equipamento</button>
        <button id='next'  class=" ml-10" style="display: none;  position: fixed; margin-top: 1em;  ">Prosseguir com o chamado <i class="fas fa-check"></i></button>
         <canvas style="width: 150%; margin-left: -10em; margin-right: -10em; height: 100%; margin-top: -4em;" id="renderCanvas"></canvas>
    </div>
    
   <form style="display:none;" action="{{ route('chamados.salvar3d') }}" id="form-inicial" method="POST" class="">
     {{ csrf_field() }}
          <div class="container-fluid">
                <div class="row h-100 p-3" style="margin-top: -11%" >
                    <div class="col">
                        <div style="margin-top: 6em;">
                            <h2 id="titulo" align="left"> Abertura de Chamado </h2>
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
                            <div class="tab">
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      
                                      <label>Grau de urgência*</label>
                                      @php($valor = ['BAIXO','MÉDIO', 'ALTA'])
                                      <select name="cham_grau_urgencia" id="cham_grau_urgencia" class="form-control">
                                          <option hidden></option>  
                                          @foreach($valor as $value)
                                              <option value="{{$value}}"
                                                  @if(old('cham_grau_urgencia') == $value)
                                                     Selected
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
                              
                                 </div>
                               </div> 
                                <div class="tab">
                                <div class="form-group col-md-6">
                                    <label> Categoria do problema*</label>
                                    <select name="typeProblem" id="typeProblem" class="form-control">
                                        <option hidden></option> 
                                        @foreach ($tipos_problemas as $tipo)
                                            <option value="{{$tipo -> probl_id}}"
                                                @if(old('typeProblem') == $tipo->probl_id)
                                                    Selected
                                                @endif    
                                            >{{$tipo -> probl_tipo}}</option>
                                        @endforeach
                                    @if ($errors->has('typeproblem')) 
                                        <script >
                                            $('#typeProblem').addClass('alert-danger');
                                        </script>
                                    @endif
                                    </select>
                                </div>
                                <div  class="form-group col-md-7">
                                    <label> Subcategoria*</label>
                                    <select name="cham_sublista_problema"  class="form-control cham_sublista_problema" id="sublist">
                                        <option disabled>Selecione uma Categoria</option>
                                    </select>
                                    @if ($errors->has('cham_sublista_problema')) 
                                        <script >
                                            $('.cham_sublista_problema').addClass('alert-danger');
                                        </script>
                                    @endif
                                  </div>
                                 </div>       
                                 <div class="tab">
                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                           <input type="hidden" name="cham_sala" id="option" value="">
                              
                                      </div>
                                  </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <label>Descrição do problema</label>
                                          <textarea name="cham_descricao" id="cham_descricao" class="form-control" value="">{{ old('cham_descricao') }}</textarea>
                                          <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
                                          @if ($errors->has('cham_descricao')) 
                                              <script >
                                                  $('#cham_descricao').addClass('alert-danger');
                                              </script>
                                          @endif
                                      </div>
                                        
                                  </div>
                                </div>
                    
                                 <input type="hidden" name="cham_equip" id="cham_equip" value="">

                                    <button class='btn btn-success' id='enviarform' type="submit">Adicionar</button>
                                    <div style="overflow:auto;">
                                        <div id="btns" style="float:right;">
                                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                                          <button type="button" id="nextBtn" onclick="nextPrev(1)">Próximo</button>
                                        </div>
                                      </div>
                                      <!-- Circles which indicates the steps of the form: -->
                                      <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
           </div>
    </form>
</body>
  <link rel="stylesheet" type="text/css" href="/css/add3d.css">
  <script type="text/javascript" src='/js/add3d.js'>
  </script>
  <script type="text/javascript" src='/js/add3d_script.js'>
  </script>   
  <script type="text/javascript" src='/js/add3d_script2.js'>    
  </script>

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
      
        </script>
        <!-- Main JS-->
        <script src="/js/main.js"></script>
        <script src="/js/select-sublistas.js"></script>
         

       <script>
             $('#adc-menu').click();
            $(document).ready( function(){
                $('#adc-cham-3d').parent('li').addClass("active");
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


</body>
</html>
