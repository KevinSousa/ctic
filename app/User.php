<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\hasMany;


class User extends Authenticatable
{
    use Notifiable;

    /*nome da tabela*/
    protected $table    =   "users";

    /*nome dos atributos que poderão ser não alterados*/
    protected $guarded  = ['user_id'];
    
    /*nome dos atributos que poderão ser alterados*/
    protected $fillable = ['user_name','user_funcao','user_email', 'user_password', 'user_cpf', 'user_numero_siap'];

    protected $hidden = ['user_password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    /*Função que representa o relacionamento de um para muitos*/
     public function user_funcao(){
         return $this->hasMany(Funcao::class);
     }   
    /*Função que representa o relacionamento de muitos para um*/
     public function cham_user(){
        return $this->hasMany(Chamado::class);
    }
}
