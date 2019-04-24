
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <img id="ifpe" src="/icon/ifpe.png">
            <form class="form-signin" method="post" action="{{route('login.entrar')}}">
              {{ csrf_field() }}
              <div class="form-label-group">
                <input name="user_email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">E-Mail</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Senha</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              <hr class="my-4">
              <div align="center">
                <a href="#">Esqueci minha Senha </a>ou<a href="{{route('register')}}"> Registre-se</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>