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
    protected $primaryKey  = 'user_id';
    
    /*nome dos atributos que poderão ser alterados*/
    protected $fillable = ['user_name','user_funcao','user_email', 'password', 'user_cpf', 'user_siap_matricula', 'user_telefone', 'user_imagem'];

    protected $hidden = ['password', 'remember_token'];

    // public function setPasswordAttribute($password) {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // protected $casts = ['email_verified_at' => 'datetime'];
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
    /*Função que representa o relacionamento de um para muitos*/
     public function user_funcao(){
         return $this->hasMany(Funcao::class);
     }   
    /*Função que representa o relacionamento de muitos para um*/
     public function cham_user(){
        return $this->hasMany(Chamado::class);
    }
    /*Função que representa o relacionamento de muitos para um*/
     public function event_user(){
        return $this->hasMany(Event::class);
    }
}
