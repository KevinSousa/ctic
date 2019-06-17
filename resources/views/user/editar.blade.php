@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')

<div class="container-fluid">
    <div class="row h-100 p-3"  >
        <div class="col">
            <div style="margin-top: -1em;">
                <h2 id="titulo" align="left">Editar Usuário</h2>
                <br>
                
                <!-- Mensagem de Succeso ao Editar Dados -->
                @if(session('success'))
                    <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">              
                        <p>{{session('success')}}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </ol> 
                    <?php Session::pull('fail')?>         
                @endif
                
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
        		<form method="post" action="{{route('user.update', $usuario->user_id) }}" class="ui form" enctype="multipart/form-data">
        			{{ csrf_field() }}
        			@include('user._form')
        			<button class="btn btn-success" id="mudar" type="submit" > Atualizar </button>
<!--                     <a href="{{ redirect()->back()->getTargetUrl() }}">
                        <button class="btn btn-primary">Voltar</button>
                    </a> -->
                </form>
                <!-- </div> -->
            </div>
        </div>
        <div class="col h-100 p-3" style="margin: 0 auto;">
            <img src="{{asset('img-05.png')}}" alt="" class="icons-edt">
        </div>
    </div>    
</div> 


<script src="/vendor/Inputmask/dist/jquery.inputmask.bundle.js"></script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

     <!-- Jquery JS-->
        <script src="/vendor/jquery-3.2.1.min.js">
        
        </script>
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
        <script src="/js/cpf.js"></script>
        <!-- Mask JS-->
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
    .icons-edt{
        width: 60%;
        -webkit-transition: all 0.6s;
        -o-transition: all 0.6s;
        -moz-transition: all 0.6s;
        transition: all 0.6s;
        margin-top: 20%;
        margin-left: 12%;
    }
    .icons-edt:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

</style>
