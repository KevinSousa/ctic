@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button{
            -webkit-appearance:none;
        }
        input[type=number]{
            -moz-appearance:textfield;
            appearance:textfield;
        }     
    </style>
<title>Equipamentos{</title>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
            <div style="margin-top: 6em;">
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
            <!-- Mensagens de Erro -->
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

                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label>Adicione o tipo do equipamento*</label>
                    <!-- @if ($errors->has('equip_tipo'))
                        <p style="margin-left:1em;color:red;font-size: small;">{{$errors->first('equip_tipo')}}</p>
                    @endif  -->         
                        <select name="equip_tipo" id="equip_tipo" class="form-control">
                            <option disabled>Escolha o tipo de equipamento</option> 
                            <option disabled>---</option> 
                            <option hidden=""></option> 
                            @foreach ($TipoEquip as $tipo)
                                <option value="{{$tipo -> tipo_id}}"
                                    @if (old('equip_tipo') == $tipo -> tipo_id or !empty($equipamento->equip_tipo) == $tipo->tipo_id)    
                                        Selected
                                    @endif>
                                        {{$tipo -> tipo_nome}}
                                    </option>
                            @endforeach

                            $equipamento->equip_tipo == $tipo->tipo_id
                        </select>
                        @if ($errors->has('equip_tipo')) 
                            <script >
                                $('#equip_tipo').addClass('alert-danger');                                            
                            </script>
                        @endif

                    <label>Adicione a marca do equipamento*</label>
                    <!-- @if ($errors->has('equip_marca'))
                        <p style="margin-left:1em;color:red;">{{$errors->first('equip_marca')}}</p>
                    @endif    -->       
                    <input type="text" name="equip_marca" id="equip_marca" value="{{old('equip_marca',$equipamento->equip_marca ?? '')}}" placeholder="Ex: Samsung" class="form-control" required>
                    <label>Adicione o numero de tombamento do equipamento*</label>
                    <!-- @if ($errors->has('equip_tombamento'))
                        <p style="margin-left:1em;color:red;font-size:small">{{$errors->first('equip_tombamento')}}</p>
                    @endif  -->
                    <input type="number" name="equip_tombamento" id="equip_tombamento" value="{{old('equip_tombamento',$equipamento->equip_tombamento ?? '')}}" placeholder="Ex: 221529"  class="form-control" required>
                    @if ($errors->has('equip_tombamento')) 
                        <script >
                            $('#equip_tombamento').addClass('alert-danger');                                            
                        </script>
                    @endif
                </div>
                @isset($equipamento)
                    <button class="btn btn-success" type="submit">Editar Equipamento</button>
                    <a href="{{ redirect()->back()->getTargetUrl() }}">
                        <button class="btn btn-primary">Voltar</button>
                    </a>
                @else
                   <button class="btn btn-success" type="submit">Adicionar</button>
                @endisset
                </form>
            </div>
        </div>
		<div class="col h-100 p-3" style="margin: 0 auto;margin-top: -6em">
			<img src="{{asset('img-01.png')}}" alt=""style="margin-top: 35%; margin-left: 12%">
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

        <script>
            $(document).ready( function(){
                $('#adc-menu').click();
                $('#adc-equip').parent('li').addClass("active");

                (function ($) {
                "use strict";
    /*==================================================================
    [ Validate ]*/
    var name = $('.validate-input input[name="name"]');
    var email = $('.validate-input input[name="email"]');
    var subject = $('.validate-input input[name="subject"]');
    var message = $('.validate-input textarea[name="message"]');

    $('.validate-form').on('submit',function(){
        var check = true;
        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }
        if($(subject).val().trim() == ''){
            showValidate(subject);
            check=false;
        }
        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }
        if($(message).val().trim() == ''){
            showValidate(message);
            check=false;
        }
        return check;
    });
    $('.validate-form .input1').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });
    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }
    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }
    })(jQuery);
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

	