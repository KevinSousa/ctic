@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<style>
    
input[type=number]::-webkit-inner-spin-button{
            -webkit-appearance:none;
        }
        input[type=number]{
            -moz-appearance:textfield;
            appearance:textfield;
        }
</style>
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
                <form action="{{ route('chamados.salvar') }}" method="POST" class="">
                    {{ csrf_field() }}
                            
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

                    </div>

                    <div class="form-row">
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
                        <div class="form-group col-md-5">
                            <label>Tombamento*</label>
                            <input type="number" name="cham_equip" id="cham_equip" maxlength="8" value="{{old('cham_equip')}}" placeholder="Ex: 9543154"  class="form-control" required>
                            <div class="list_tombamento" id='list_tombamento' style="background-color: #babaca;">
                               
                            </div>

                            @if ($errors->has('cham_equip')) 
                                 <script >
                                    $('#cham_equip').addClass('alert-danger');                                            
                                 </script>
                             @endif
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Laboratório*</label>
                            <select name="cham_sala" id="cham_sala" class="form-control">
                                <option hidden></option> 
                                @foreach ($salas as $sala)
                                    @if (old('cham_sala') == $sala->sala_id)
                                        <option value="{{$sala -> sala_id}}" selected> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                                    @else
                                        <option value="{{$sala -> sala_id}}"> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                                    @endif
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
                            <textarea name="cham_descricao" id="cham_descricao" class="form-control" value="">{{ old('cham_descricao') }}</textarea>
                            <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}">
                            @if ($errors->has('cham_descricao')) 
                                <script >
                                    $('#cham_descricao').addClass('alert-danger');
                                </script>
                            @endif
                        </div>
                          
                    </div>
                    <center>
                        <button class="btn btn-success" type="submit">Adicionar</button>
                        <a href="{{route('chamados.index')}}"><button class="btn btn-primary">Voltar</button></a> 
                    </center>
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
             $('#adc-menu').click();
            $(document).ready( function(){
                $('#adc-cham').parent('li').addClass("active");
            });
              $("#cham_equip").on('keypress',function(){
                    var numero = $("#cham_equip").val();
                                    $.ajax({
                    type: "GET", 
                    url: "/gettombamento/"+numero,
                    cache: false,
                    success: function(retorno) {
                            var retornos = JSON.parse(retorno);
                            if (retornos != false || retornos != []) {
                                    $("#list_tombamento").html(" ");
                                    for (var i= 0; i <retornos.length; i++){
                                        if (i < 9) {
                                        $("#list_tombamento").append("<li id='lista'>"+retornos[i].equip_tombamento+"</li>");
                                        $("#list_tombamento").show("slow",'linear');        
                                        }
                                     }        
                            }   
                    },
                     error: function() {
                        $("#list_tombamento").html("<li>Tombamento não encontrado</li>");
                      } 
                });   
            });
        $(document).on('click', '#lista', function(){
            $("#cham_equip").val(this.innerHTML);
        });
        $("#cham_equip").on('focusout', function(){
                 $("#list_tombamento").hide("slow",'linear');    
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
    #lista:hover{
        background-color: #029242;
    }
    #lista{
         padding: 0.5em;
    }
    .list_tombamento{
       
        align-items: center;
        list-style-type: none;
         z-index: 1000;
        background-color: #FFF;
        color: #FFF;
        background-color: #666;
        text-align: center; /* Centraliza o texto */
       position:absolute;
        width: 80%;

    }
</style>
