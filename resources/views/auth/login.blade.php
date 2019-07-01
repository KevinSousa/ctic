
  <!DOCTYPE html>
<html>
<head>
  <title>Entrar</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Js --> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div  >
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <img id="ifpelogin" src="/logohelp2.png">
        <div class="card card-signin my-5" id="radius">
          <div class="card-body">
              <!-- Mensagens de Erros -->
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              @endforeach
              @if(session('fail'))
                <ol class="alert alert-danger alert-dismissible fade show mt-2" role="alert">              
                    @foreach(session('fail') as $key)
                      <p>{{$key}}</p>
                    @endforeach  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('fail')?>
              @endif  
              <!-- Mensagens de Sucesso ao Cadastrar-se -->
              @if(session('success'))
                <ol class="alert alert-success alert-dismissible fade show mt-2" role="alert">              
                    <p>{{session('success')}}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol> 
                <?php Session::pull('fail')?>         
              @endif

            <form class="form-signin" method="post" action="{{route('login.entrar')}}">
              {{ csrf_field() }}
              <div class="form-label-group">
                <input name="user_email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" value="{{old('user_email')}}" required autofocus>
                <label class="text-center" for="inputEmail">E-mail</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label class="text-center" for="inputPassword">Senha</label>
              </div>
              <!-- <a href="#">Esqueça-me</a> -->
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              <hr class="my-4">
              <div align="center">
                     

                <!-- <a href="#">Esqueci minha Senha </a> ou  -->
              <a href="{{route('user.cadastrar')}}" class="btn btn-lg btn-success btn-block text-uppercase"> Registre-se</a>
                <!-- <br><a href="{{route('register')}}"> Registre-se Cleyton</a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div> 
</body>