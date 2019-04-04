@extends('layouts.app')
@section('content')

<div id="index">
	<div id="titulo" align="left">
		<h1> Cadastrar usuário </h1>
	</div>
	<br>
	<form method="post" action="{{route('user.salvar')}}" class="">
		{{ csrf_field() }}
		@include('user._form')
		<button class="btn btn-success" id="enviar" type="submit"> Cadastrar </button>
	</form>
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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script src="/vendor/Inputmask/dist/jquery.inputmask.bundle.js"></script>

        {{-- mascara de cpf --}}
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
                  document.getElementById('cpf').innerHTML =  "<p class='text-success'>CPF OK</p>";
                   document.getElementById('user_cpf').style.backgroundColor = "#00FF7F";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
            }
            function mudar_falha(){
                  document.getElementById('cpf').innerHTML =  "<p class='text-danger'>CPF INVÁLIDO</p>";
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
              if (strCPF == "00000000000") return mudar_falha();
                 
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
        

@endsection

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

</style>
