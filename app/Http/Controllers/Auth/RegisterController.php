<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'user_name' => 'required',
                'user_cpf' => 'required|unique:users',
                'user_siap_matricula' => 'required|unique:users',
                'user_email' => 'required| email| max:30| unique:users',
                'password' => 'min:8|required_with:password2|same:password2',
                'password2' => 'min:8'
            ],[
                'user_name.required' => 'É obrigatório preencher o Nome',
                'user_cpf.required' => 'É obrigatório preencher o CPF',
                'user_cpf.unique' => 'Já existe um registro com esse CPF',
                'user_siap_matricula.required' => 'É obrigatório preencher a Matricula/Siap',
                'user_siap_matricula.unique' => 'Já existe um registro com essa Matricula/Siap',
                'user_email.required' => 'É obrigatório preencher o Email',
                'user_email.email' => 'Digite um E-mail válido',
                'user_email.max' => 'Digite menos de 30 caracteres no campo E-mail',
                'user_email.unique' => 'Já existe um registro com esse Email',
                'password.min' => 'Digite mais de 8 caracteres no campo de Senha',
                'password.required_with'=> 'É necessário preencher os dois campos de senha',
                'password.same'=> 'As senhas tem que estar iguais',
                'password2.min' => 'Digite mais de 8 caracteres no campo Repita a Senha',
            ]);
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'password' => Hash::make($data['password']),
            'user_cpf' => $data['user_cpf'],
            // Adicionar excessão para adiministrador na user_funcao
            'user_funcao' => $data['user_funcao'],
            'user_telefone' => $data['user_telefone'],
            'user_siap_matricula' => $data['user_siap_matricula'],
        ]);
    }
}
