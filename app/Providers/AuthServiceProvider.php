<?php

namespace App\Providers;

use App\User;
use App\Funcao;
use Illuminate\Support\Facades\Gate;
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
    public function boot()
    {        
        $this->registerPolicies($gate);
    
        /* Só o usuario manager pode criar evento */
        $gate->define('admin', function(User $user){
            return $user->user_funcao == '1';
        });
        $gate->define('user', function(User $user){
            return $user->user_funcao != '1';
        });

    }
}
