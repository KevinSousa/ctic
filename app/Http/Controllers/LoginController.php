<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function index(){

    	return view('auth.login');

    }

    public function login(Request $req){

    	$dados = $req->all();

    	if(Auth::attempt(['user_email'=>$dados['user_email'],'password'=>$dados['password']])){

            return redirect() -> route('home');
            
    	} else {
            return redirect()->route('login');
        }
        
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }
}
