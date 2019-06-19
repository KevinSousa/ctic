<!DOCTYPE html>
<html>
<head>
  <title>Cadastre-se</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <!-- Js --> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script src="/vendor/Inputmask/dist/jquery.inputmask.bundle.js"></script>
</head>
<body><div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-12 col-lg-5 my-5  mx-auto" >            
            <div class="card card-signin">
                <div class="card-body mt-0" style="margin-top: 8em;">

                    <img id="ifpe" src="/logohelp2.png">
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
                    <form method="post" action="{{route('user.salvar')}}" class="form-signin" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="user_name" placeholder="a" value="{{old('user_name')}}" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                                @if ($errors->has('user_name')) 
                                    <script >
                                        $('#nome').addClass('alert-danger');
                                    </script>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="user_cpf" class="form-control user_cpf" type="text" name="user_cpf" value="{{ old('user_cpf') }}" required placeholder="a" maxlength="14"  data-toggle="tooltip" data-placement="top" title="Adicione um CPF Válido">
                                    <label id="cpf" class="text-center" for="user_cpf" >CPF *</label>
                                    @if ($errors->has('user_cpf')) 
                                        <script >
                                            $('#user_cpf').addClass('alert-danger');
                                        </script>
                                    @endif
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input id="inputMatricula" class="form-control" type="text" name="user_siap_matricula" placeholder="a" value="{{old('user_siap_matricula')}}" maxlength="14" required>
                                    <label for="inputMatricula" class="text-center">Matricula ou Siape *</label>
                                    @if ($errors->has('user_siap_matricula')) 
                                        <script >
                                            $('#inputMatricula').addClass('alert-danger');
                                        </script>
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="email" name="user_email" placeholder="a" value="{{old('user_email')}}" required>
                                <label for="email" class="text-center">E-mail *</label>
                                @if ($errors->has('user_email')) 
                                    <script >
                                        $('#email').addClass('alert-danger');
                                    </script>
                                @endif
                            </div>
                            <div class="form-label-group">
                                <input class="form-control" type="text" name="user_telefone" id="user_telefone" placeholder="a" value="{{old('user_telefone')}}">
                                <label class="text-center" for="user_telefone">Celular</label>
                                @if ($errors->has('user_telefone')) 
                                    <script >
                                        $('#user_telefone').addClass('alert-danger');                                            
                                    </script>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <div class="file-field">
                                    <div class="btn btn-light border" style="height:4em;">
                                        <label id="value" style='margin-top: -1em;'><i class="fas fa-image"></i> 
                                            <spam id='spam'> Procurar uma imagem</spam> 
                                            <input type="file" style="border-radius: 100px;margin-top: -3em;" name="user_imagem" class="custom-file-input form-control file" id="file">
                                        </label> 
                                    </div>
                                </div>
                            
                                <div class="form-label-group">
                                    <select value="Função *"  style="border-radius: 100px;" name="user_funcao" class="form-control mt-3">
                                        <option placeholder="Função *" disabled="">Escolha a Função *</option>
                                        <option value="" disabled="">---</option>
                                        @foreach($funcaos as $func)
                                            @if($func->funcao_name != 'Administrador')
                                                <option value="{{$func -> funcao_id}}">{{$func -> funcao_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
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
                                            $('#senha').addClass('alert-danger');
                                            $('#senha2').addClass('alert-danger');
                                        </script>
                                    @endif
                            </div>
                            <button class="btn btn-success col-md-12  text-uppercase" id="mudar" type="submit">
                                Cadastrar
                            </button>
                        </form><br>
                        <form method="get" action="{{route('login')}}" class="form-signin" style="text-decoration: none;">
                            <button style="float: right;" class="btn btn-primary col-md-12 text-uppercase">
                                Voltar
                            </button>  
                        </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script >
    // $('#user_cpf').tooltip();

      $('#file').on('change', function() {
          var fileName = $(this)[0].files[0].name;
          var input =  $('#file');
          $('#value').val(input);
          $('#spam').html(fileName);
        });
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