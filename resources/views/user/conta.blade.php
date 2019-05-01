<!DOCTYPE html>
<html>
<head>
	<title>Conta</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
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
<body><div id="index">
	<div id="titulo" align="left">
		<h1 style="color: white;"> Conta</h1>
	</div>
	<br>
		{{ csrf_field() }}
		@if( session('sucess'))
			<div class="alert alert-sucess">
					{{ session('sucess')}}
			</div>
		@endif
	<form method="post" action="{{route('user.update', Auth::user()->user_id)}}" class="">
	<div class="form-group">
                        {{ csrf_field() }}
		<label for="">Nome Completo *</label>
		<input class="form-control" type="text" name="user_name" value="{{Auth::user()->user_name}}" required="">
	</div>


	<div   class="form-row">
		<div class="form-group col-md-6">
			<!---CONcertando conflitos aki  -->
			<label  for="" id="cpf">CPF *</label>

			<input class="form-control" type="text" name="user_cpf" value="{{Auth::user()->user_cpf}}" required="" maxlength="14" id="user_cpf">
		</div>

		<div class="form-group col-md-6">
			<label for="">Número da Matricula ou Siape *</label>

			<input class="form-control " type="text" name="user_siap_matricula" value="{{Auth::user()->user_siap_matricula}}" required="" maxlength="14" disabled>

		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="">Email *</label>
			<input class="form-control" type="email" name="user_email" value="{{Auth::user()->user_email}}" required="">
		</div>
		<div class="form-group col-md-6">
			<label for="">Celular *</label>
			<input class="form-control" type="text" value="{{Auth::user()->user_telefone}}" name="user_telefone" id="user_telefone">
		</div>
	</div>

	<div class="form-group">
		<label for="">Função</label>

		<select name="user_funcao" class="form-control">
			@foreach($funcaos as $func)
				@if($func->funcao_id == Auth::user()->user_funcao)
				<option value="{{$func -> funcao_id}}" 
					@if($func->funcao_id == Auth::user()->user_funcao) Selected @endif;
					@if($func->funcao_id == Auth::user()->user_funcao) disabled @endif;
					>{{$func->funcao_name}}</option>
				@endif;			
			@endforeach
		</select>
	</div>


	<div class="form-row">

		<div class="form-group col-md-6">
			<label> Senha *</label>
			<input class="form-control" type="password" name="password" required="" maxlength="16" minlength="8">
		</div>

		<div class="form-group col-md-6">
			<label for=""> Repita a Senha *</label>	
			<input class="form-control" type="password" name="" maxlength="16" minlength="8">
		</div>

	</div>
	<button class="btn btn-success" id="enviar" type="submit"> Cadastrar </button>

	</form>
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
                  document.getElementById('cpf').innerHTML =  "<li class='text-success'>CPF OK</li>";
                   document.getElementById('user_cpf').style.backgroundColor = "#00FF7F";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
            }
            function mudar_falha(){
                  document.getElementById('cpf').innerHTML =  "<li class='text-danger'>CPF INVÁLIDO</li>";
                   document.getElementById('user_cpf').style.backgroundColor = "#B22222";
                   document.getElementById('user_cpf').style.color = "white";
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