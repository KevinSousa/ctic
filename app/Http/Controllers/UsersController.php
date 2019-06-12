<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\UsersController;
use Auth;
use App\User;
use App\Funcao;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index(Request $request){

        $users = DB::table('users')
                ->join('funcaos', 'user_funcao', '=' , 'funcaos.funcao_id')
                ->select('users.*', 'funcaos.funcao_name')
                ->Paginate(5);

        $funcaos = DB::table('funcaos')
                ->select('funcao_id', 'funcao_name')
                ->orderBy('funcao_name', 'asc')
                -> get();

        $ajax = false;
        if ($request->ajax()){
            $ajax = true;
        }
        return view ('user.index', compact('users','funcaos','ajax'));
    	
    }

    public function cadastrar(){

        $funcaos = DB::table('funcaos')
            ->select('funcao_id', 'funcao_name')
            ->orderBy('funcao_name', 'asc')
            ->get();

        return view ('user.cadastro', compact('funcaos'));

    }

	public function save(Request $req){


        $dados = $req -> all();
        $cpf = $dados['user_cpf'];
        $telefone = $dados['user_telefone'];
        
        $cpf_formatado = trim($cpf);
        $cpf_formatado = str_replace(".", "", $cpf_formatado);
        $cpf_formatado = str_replace("-", "", $cpf_formatado);

        // VALIDAÇÃO DE CPF
        if(empty($cpf_formatado)) {

            \Session::flash('warning', 'CPF Inválido');
            return Redirect::to('/user/cadastrar')->withInput()->withErrors('CPF Inválido');

        }
     
        $cpf_formatado = preg_match('/[0-9]/', $cpf_formatado)?$cpf_formatado:0;

        $cpf_formatado = str_pad($cpf_formatado, 11, '0', STR_PAD_LEFT);
         
        
        if (strlen($cpf_formatado) != 11) {

            \Session::flash('warning', 'CPF Inválido');
            return Redirect::to('/user/cadastrar')->withInput()->withErrors('CPF Inválido');

        }
        
        else if ($cpf_formatado == '00000000000' || 
            $cpf_formatado == '11111111111' || 
            $cpf_formatado == '22222222222' || 
            $cpf_formatado == '33333333333' || 
            $cpf_formatado == '44444444444' || 
            $cpf_formatado == '55555555555' || 
            $cpf_formatado == '66666666666' || 
            $cpf_formatado == '77777777777' || 
            $cpf_formatado == '88888888888' || 
            $cpf_formatado == '99999999999') {
            \Session::flash('warning', 'CPF Inválido');
            return Redirect::to('/user/cadastrar')->withInput()->withErrors('CPF Inválido');

         } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf_formatado{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf_formatado{$c} != $d) {
                    \Session::flash('warning', 'CPF Inválido');
                    return Redirect::to('/user/cadastrar')->withInput()->withErrors('CPF Inválido');
                }
            }
            
            $senhas = $req -> validate([
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

             

            if ($req->hasFile('user_imagem') && $req->file('user_imagem')->isValid()) {
             
        
              $imagem = $dados['user_imagem'];
             $numero = rand(1111,9999);
             $dir = "icon/user";
             $ex = $req->user_imagem->extension();
             $nomeImagem = "imagem_".$numero.".".$ex;
             $imagem->move($dir,$nomeImagem);
             $dados['user_imagem'] = $dir."/".$nomeImagem;


            $valor = $dados['user_cpf'];
            $valor = str_replace(".", "", $valor);
            $valor = str_replace("-", "", $valor);
            $dados['user_cpf'] = $valor;

            //  $upload = $req->user_imagem->storeAs('icon/user/', $namefile);
            }else{
                $dados['user_imagem'] = "icon/user/imagem.png";
            }
                $mensagem = 'Sucesso ao fazer cadastro, Entre.';
            User::create($dados);
            // $st = session()->put('sucesso', ['sucesso' => $mensagem]);
            return redirect() -> route('login')
                              -> with('success',$mensagem);
            
        }


    }

	public function remove($id){

        DB::table('users')->where('user_id', '=', $id)->delete();
        return redirect()->route('home');

    }

    public function edit(Request $request, $id){
        $ajax = false;

        if ($request->ajax()){
            $ajax = true;
        }

        if (Auth::user()-> user_id != $id){
            $id = Auth::user()-> user_id;
            $usuario = DB::table('users')->where('user_id', '=', $id)->first();
            $funcaos = Funcao::all()->except('administrador');
            $error = "Sem permissão";
            return view('user.editar',compact('usuario','funcaos','ajax','error'));  
        }

        $usuario = DB::table('users')->where('user_id', '=', $id)->first();
        $funcaos = Funcao::all()->except('administrador');
        return view('user.editar',compact('usuario','funcaos','ajax'));    
    }

	public function update(Request $request){

        $dados = $request->all();
        $id = Auth::user()->user_id;
        $senhas = $request -> validate([
                'user_name' => 'required',
                'user_cpf' => 'required',
                'user_email' => 'required| email| max:30',
            
            ],[
                'user_name.required' => 'É obrigatório preencher o Nome',
                'user_cpf.required' => 'É obrigatório preencher o CPF',
                'user_cpf.unique' => 'Já existe um registro com esse CPF',
                'user_siap_matricula.required' => 'É obrigatório preencher a Matricula/Siap',
                'user_email.required' => 'É obrigatório preencher o Email',
                'user_email.email' => 'Digite um E-mail válido',
                'user_email.max' => 'Digite menos de 30 caracteres no campo E-mail',
                'user_email.unique' => 'Já existe um registro com esse Email',
        ]);
        if ($request->password !== $request->password2) {
            return redirect()
                 -> route('user.conta', compact('user'));
        }
        $senha = bcrypt($request->password);
        $nomeImagem = null;
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $numero = rand(1111,9999);
            $dir = "icon/user/";
            $ex = $imagem -> guessClientExtension();
            $nomeImagem = "imagem_".$numero.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        $User                       = User::find(Auth::user()->user_id);
        $User->user_id              = Auth::user()->user_id;
        $User->user_name            = $request->user_name;  
        $User->user_funcao          = Auth::user()->user_funcao;
        $User->user_email           = $request->user_email;
        $User->password             = Auth::user()->password;
        $User->user_cpf             = $request->user_cpf;
        $User->user_siap_matricula  = isset($request->user_siap_matricula) ? $request->user_siap_matricula : "123";
        $User->user_telefone          = $request->user_telefone;
            if(isset($nomeImagem)){
                $User->user_imagem    = $nomeImagem;
            }
        $User->save();

        $user = Auth::user()->user_id;
        $mensagem = 'Dados Alterados com Sucesso!';
        return redirect()
                 -> route('user.editar',compact('id'))
                 ->with('success',$mensagem);        
    }

    public function conta($id){

    $funcaos = Funcao::all();
    return view('user.conta', compact('funcaos'));
    }

}