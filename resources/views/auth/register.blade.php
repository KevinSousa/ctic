<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/index-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>
                    <ol>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ol>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>


@if ($errors->has('user_name'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
                              
                            </div>
                            </div>
                             <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Funcão') }}</label>

                            <div class="col-md-6">
                                <input id="user_funcao" type="text" class="form-control{{ $errors->has('funcao') ? ' is-invalid' : '' }}" name="user_funcao" value="{{ old('user_funcao') }}" required autofocus>

                                @if ($errors->has('user_funcao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_funcao') }}</strong>
                                    </span>
                                @endif
                            </div>
                             </div>

                             <div class="form-group row">
                            <label for="user_cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="user_cpf" type="text" class="form-control{{ $errors->has('user_cpf') ? ' is-invalid' : '' }}" name="user_cpf" value="{{ old('user_cpf') }}" required autofocus>

                                @if ($errors->has('user_cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                             </div>
                             <div class="form-group row">
                            <label for="user_siap_matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                            <div class="col-md-6">
                                <input id="user_siap_matricula" type="text" class="form-control{{ $errors->has('user_siap_cpf') ? ' is-invalid' : '' }}" name="user_siap_matricula" value="{{ old('user_siap_matricula') }}" required autofocus>

                                @if ($errors->has('user_siap_matricula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_siap_matricula') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                             <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="user_telefone" type="text" class="form-control{{ $errors->has('user_telefone') ? ' is-invalid' : '' }}" name="user_telefone" value="{{ old('user_telefone') }}" required autofocus>

                                @if ($errors->has('user_telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_telefone') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="user_email" value="{{ old('user_email') }}" required>

                                @if ($errors->has('user_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
