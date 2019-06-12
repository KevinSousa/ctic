@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')

@section('content')
<title>Funções</title>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
            <div style="margin-top: 6em;">
            @isset($funcao)
                <h2 id="titulo" align="left"> Editar Função </h2>
            @else
                <h2 id="titulo" align="left"> Cadastro de Função </h2>
            @endisset
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
           
            @isset($funcao)
                <form method="post" action="{{route('funcao.update', $funcao->funcao_id)}}" class="ui form">
            @else
                <form method="post" action="{{route('funcao.store')}}" class="ui form">
            @endisset
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label>Digite o nome da Função*</label>
                    <!-- @if ($errors->has('funcao_name'))
                            <p style="margin-left:1em;color:red;font-size:small">{{$errors->first('funcao_name')}}</p>
                    @endif -->    
                    <input type="text" name="funcao_name" id="funcao_name"  value="{{ isset($funcao->funcao_name) ? $funcao->funcao_name : '' }}" placeholder="Ex: Administrador"  class="form-control" required>
                    @if ($errors->has('funcao_name')) 
                        <script >
                            $('#funcao_name').addClass('alert-danger');
                        </script>
                    @endif
                </div>
                @isset($funcao)
                    <button class="btn btn-success" type="submit">Editar Função</button>
                    <a href="{{  redirect()->back()->getTargetUrl() }}">
                        <button class="btn btn-primary">Voltar</button>
                    </a>
                @else
                    <button class="btn btn-success" type="submit">Adicionar</button>
                @endisset
                </form>
            </div>
        </div>
        <div class="col h-100 p-3" style="margin: 0 auto; margin-top: -6em">
            <img src="{{asset('img-03.png')}}" class="icons-adc" >
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
                $('#adc-funcao').parent('li').addClass("active");
               
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


	