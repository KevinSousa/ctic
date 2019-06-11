<!DOCTYPE html>
<html>
<head>
    <title>Cadastre-se</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    @yield('title')
        <!-- Fontfaces CSS-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/index-css.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script src="/vendor/Inputmask/dist/jquery.inputmask.bundle.js"></script>

</head>
<body><div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-12 col-lg-5 my-5  mx-auto" >
            <div class="card card-signin  " style="box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);">
                <div class="card-body">
                    <img id="ifpe"  src="/icon/ifpe.png">
                    <!-- <ol>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ol> -->
                       
                       <!--  <form method="post" action="{{route('user.salvar')}}" class="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="user_name" placeholder="a" value="{{old('user_name')}}" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                                @if ($errors->has('user_name')) 
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                      <p style="font-size:medium;">{{ $errors->first('user_name') }}</p> 
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <script >
                                        document.getElementById('nome').style.borderColor ="red";
                                    </script>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="user_cpf" class="form-control user_cpf" type="text" name="user_cpf" value="{{ old('user_cpf') }}" required placeholder="a" maxlength="14"  data-toggle="tooltip" data-placement="top" title="Adicione um CPF Válido">
                                    <label id="cpf" class="text-center" for="user_cpf" >CPF *</label>
                                    @if ($errors->has('user_cpf')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('user_cpf') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('user_cpf').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input id="inputMatricula" class="form-control" type="text" name="user_siap_matricula" placeholder="a" value="{{old('user_siap_matricula')}}" maxlength="14" required>
                                    <label for="inputMatricula" class="text-center">Matricula ou Siape *</label>
                                    @if ($errors->has('user_siap_matricula')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('user_siap_matricula') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('inputMatricula').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="email" name="user_email" placeholder="a" value="{{old('user_email')}}" required>
                                <label for="email" class="text-center">Email *</label>
                                @if ($errors->has('user_email')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('user_email') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('email').style.borderColor ="red";
                                        </script>
                                    @endif
                            </div>
                            <div class="form-label-group">
                                <input class="form-control" type="text" name="user_telefone" id="user_telefone" placeholder="a" value="{{old('user_telefone')}}">
                                <label class="text-center" for="user_telefone">Celular</label>
                                @if ($errors->has('user_telefone')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('user_telefone') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('user_telefone').style.borderColor ="red";
                                        </script>
                                    @endif
                            </div>

                            <div class="form-label-group">
                                <input type="file" style="border-radius: 100px;" name="user_imagem" class="custom-file-input form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"> 
                                
                                <label class="custom-file-label border" for="inputGroupFile01">Adicione uma foto de perfil</label>
                                <select value="Função *"  style="border-radius: 100px;" name="user_funcao" class="form-control">
                                    <option placeholder="Função *" disabled="">Escolha a Função *</option>
                                    <option value="" disabled="">---</option>
                                    @foreach($funcaos as $func)
                                        @if($func->funcao_name != 'Administrador')
                                            <option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6 ">
                                    <input id="senha" class="form-control" type="password" name="password" required placeholder="a" maxlength="16" minlength="8">
                                    <label class="text-center" for="senha"> Senha *</label>
                                    @if ($errors->has('password')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('password') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('senha').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>

                                <div class="form-label-group col-md-6">
                                    <input id="senha2" placeholder="a" class="form-control" type="password" name="password2" maxlength="16" minlength="8" required>
                                    <label class="text-center" for="senha2"> Repita a Senha *</label> 
                                    @if ($errors->has('password2')) 
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          <p style="font-size:medium;">{{ $errors->first('password2') }}</p> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <script >
                                            document.getElementById('senha2').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>    
                            </div>
                        <div class="custom-control custom-checkbox mb-3">
          
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="mudar"  type="submit">
                                Cadastrar
                            </button>                   
                        </div>
                    </form>  -->
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
                    <!-- div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                      <p style="font-size:medium;">{{ $errors->first('user_name') }}</p> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> -->
                    <form method="post" action="{{route('user.salvar')}}" class="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="user_name" placeholder="a" value="{{old('user_name')}}" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                                @if ($errors->has('user_name')) 
                                    <script >
                                        document.getElementById('nome').style.borderColor ="red";
                                    </script>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="user_cpf" class="form-control user_cpf" type="text" name="user_cpf" value="{{ old('user_cpf') }}" required placeholder="a" maxlength="14"  data-toggle="tooltip" data-placement="top" title="Adicione um CPF Válido">
                                    <label id="cpf" class="text-center" for="user_cpf" >CPF *</label>
                                    @if ($errors->has('user_cpf')) 
                                        
                                        <script >
                                            document.getElementById('user_cpf').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input id="inputMatricula" class="form-control" type="text" name="user_siap_matricula" placeholder="a" value="{{old('user_siap_matricula')}}" maxlength="14" required>
                                    <label for="inputMatricula" class="text-center">Matricula ou Siape *</label>
                                    @if ($errors->has('user_siap_matricula')) 
                                        
                                        <script >
                                            document.getElementById('inputMatricula').style.borderColor ="red";
                                        </script>
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="email" name="user_email" placeholder="a" value="{{old('user_email')}}" required>
                                <label for="email" class="text-center">Email *</label>
                                @if ($errors->has('user_email')) 
                                        
                                        <script >
                                            document.getElementById('email').style.borderColor ="red";
                                        </script>
                                    @endif
                            </div>
                            <div class="form-label-group">
                                <input class="form-control" type="text" name="user_telefone" id="user_telefone" placeholder="a" value="{{old('user_telefone')}}">
                                <label class="text-center" for="user_telefone">Celular</label>
                                @if ($errors->has('user_telefone')) 
                                        
                                        <script >
                                            document.getElementById('user_telefone').style.borderColor ="red";
                                        </script>
                                    @endif
                            </div>

                            <div class="form-label-group">
                                <input type="file" style="border-radius: 100px;" name="user_imagem" class="custom-file-input form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"> 
                                
                                <label class="custom-file-label border" for="inputGroupFile01">Adicione uma foto de perfil</label>
                                <select value="Função *"  style="border-radius: 100px;" name="user_funcao" class="form-control">
                                    <option placeholder="Função *" disabled="">Escolha a Função *</option>
                                    <option value="" disabled="">---</option>
                                    @foreach($funcaos as $func)
                                        @if($func->funcao_name != 'Administrador')
                                            <option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6 ">
                                    <input id="senha" class="form-control" type="password" name="password" required placeholder="a" maxlength="16" minlength="8">
                                    <label class="text-center" for="senha"> Senha *</label>
                                    
                                </div>

                                <div class="form-label-group col-md-6">
                                    <input id="senha2" placeholder="a" class="form-control" type="password" name="password2" maxlength="16" minlength="8" required>
                                    <label class="text-center" for="senha2"> Repita a Senha *</label> 

                                </div>    
                                    @if ($errors->has('password')) 
                                        
                                        <script >
                                            document.getElementById('senha').style.borderColor ="red";
                                            document.getElementById('senha2').style.borderColor ="red";
                                        </script>
                                    @endif
                            </div>
                        <div class="custom-control custom-checkbox mb-3">
          
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="mudar"  type="submit">
                                Cadastrar
                            </button>                   
                        </div>
                    </form>
                    <div class="custom-control custom-checkbox mb-3">
                        <a href="{{route('login')}}" style="text-decoration: none;">
                            <button style="float: right;" class="btn btn-info text-uppercase" type="submit">
                                Voltar
                            </button>  
                        </a>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
     $('#user_cpf').tooltip();
</script>
<script type="text/javascript" src="{{asset('js/cpf.js')}}"></script>
<style type="text/css">
    
    div#index {
        margin: 0px 25px 0px 25px;
    }
    div#titulo h1{
        color: #666;
    }
    .form-row, .form-group{
        text-align: left;
    }
    body{
        background: #666;
  background: linear-gradient(to right, #666, #777  );
    }
</style>
</html>