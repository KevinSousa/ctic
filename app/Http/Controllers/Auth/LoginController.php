<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_email' => 'required | email| unique:users',
            'password' => 'required |min:8',
        ],[
            'user_email.required' => 'É obrigatório preencher o Email',
            'user_email.email' => 'Digite um E-mail válido',
            'user_email.unique' => 'Já existe um registro com esse Email',
            'password.required'=> 'É necessário preencher os dois campos de senha',
            'password.min' => 'Digite mais de 8 caracteres no campo de Senha',
        ]);
    }
}
