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
    <link rel="shortcut icon" href="favicon.ico" />
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    As Senhas Devem ser iguais
                                </ul>
                            </div>          
                        @endif
                        <form method="post" action="{{route('user.salvar')}}" class="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="user_name" placeholder="a" value="{{old('user_name')}}" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="user_cpf" class="form-control user_cpf" type="text" name="user_cpf" value="{{ old('user_cpf') }}" required placeholder="a" maxlength="14" id="user_cpf">
                                    <label id="cpf" class="text-center" for="user_cpf" >CPF *</label>
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input id="inputMatricula" class="form-control" type="text" name="user_siap_matricula" placeholder="a" value="{{old('user_siap_matricula')}}" maxlength="14" required>
                                    <label for="inputMatricula" class="text-center">Matricula ou Siape *</label>
                                </div>
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="email" name="user_email" placeholder="a" value="{{old('user_email')}}" required>
                                <label for="email" class="text-center">Email *</label>
                            </div>
                            <div class="form-label-group">
                                <input class="form-control" type="text" name="user_telefone" id="user_telefone" placeholder="a" value="{{old('user_telefone')}}">
                                <label class="text-center" for="user_telefone">Celular</label>
                            </div>

                            <div class="form-label-group">
                                <input type="file" style="border-radius: 100px; name="user_imagem" class="custom-file-input form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"> 
                                
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
                                    <input id="senha2" placeholder="a" class="form-control" type="password" name="password2" maxlength="16" minlength="8">
                                    <label class="text-center" for="senha2"> Repita a Senha *</label> 
                                </div>    
                            </div>
                        <div class="custom-control custom-checkbox mb-3">
          
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="enviar" type="submit">
                                Cadastrar
                            </button>                   
                        </div>
                    </form>
                    <div class="custom-control custom-checkbox mb-3">
                        <a href="{{route('login')}}" style="text-decoration: none;">
                            <button style="float: right;" class="btn btn-info text-uppercase" id="enviar" type="submit">
                                Voltar
                            </button>  
                        </a>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
            var code  ="{{Request::query('cpf1')}}"; //codigo que é passado do back-end como segunda camada de proteção
            $(document).ready(function () { 
                var $CampoCpf = $("#user_cpf");
                $CampoCpf.mask('000.000.000-00', {reverse: true});  //deu conflito aki mas ja ta deboa kk
                $("#user_telefone").inputmask({
                    mask: ["(99) 9999-9999", "(99) 99999-9999", ],
                    keepStatic: true
                });
            });
            if(code == 'code1'){
            mudar_falha();      //chama a função se por acaso o codigo retornado do back for code1
            }
            
            function mudar_ok(){
                  document.getElementById('user_cpf').style.borderColor = "green";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
            }
            function mudar_falha(){
                  document.getElementById('user_cpf').style.borderColor = "red";
                   $('#enviar').hide();
                    //aqui nos fazemos basicamente o contrario 
            }
            $("#user_cpf").keypress(function(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
                        var vendaMediaMensal = $("#user_cpf");
                        vendaMediaMensal.focusout( function(){
                        var cpf = vendaMediaMensal.val();
                        var cpf_limp = cpf.replace(/\.|\-/g,'');
                        TestaCPF(cpf_limp);
                        });
            });
            function TestaCPF(strCPF){
                var Soma;
                var Resto;
                Soma = 0;       //testa se o cpf é valido no frontend
              if (strCPF == "00000000000" || strCPF == "11111111111"|| strCPF == "22222222222" || strCPF == "3333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "9999999999") return mudar_falha();
                 
              for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
              Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10)) ) return mudar_falha();
               
              Soma = 0;
                for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(10, 11) ) ) return mudar_falha();
                 return mudar_ok();
            }
        </script>
</body>
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