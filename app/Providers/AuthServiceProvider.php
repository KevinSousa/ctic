<?php

namespace App\Providers;

use App\User;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
=======
use App\Funcao;
use Illuminate\Support\Facades\Gate;
>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
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
<<<<<<< HEAD
    public function boot(GateContract $gate)
    {
=======
    public function boot()
    {        
>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
        $this->registerPolicies($gate);
    
        /* Só o usuario manager pode criar evento */
        $gate->define('admin', function(User $user){
            return $user->user_funcao == '1';
        });
        $gate->define('user', function(User $user){
            return $user->user_funcao != '1';
        });
<<<<<<< HEAD
=======

>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
    }
}
