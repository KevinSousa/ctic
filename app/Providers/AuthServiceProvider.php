<?php

namespace App\Providers;

use App\Chamado;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        // Permissão para o Administrador 
        $gate->define('admin', function(User $user){
            return $user->user_funcao == '1';
        });
        // Permissão para o todos menoso Adminstrador 
        $gate->define('user', function(User $user){
            return $user->user_funcao != '1';
        });
        // Permissão para o Professor 
        $gate->define('professor', function(User $user){
            return $user->user_funcao == '2';
        });
        // Permissão para o Usuario só poder modificar o seu chamado 
        $gate->define('cham-user', function(User $user, Chamado $chamados){
            if(Auth::user()->user_id == $chamados->cham_user){
                return true;
            };
        });
    }
}
