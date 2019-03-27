<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcao extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"funcaos";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'funcao_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['funcao_nome'];

	/*nome dos atributos que representam as horas*/
	public $timestamps = false;
		
	/*Função que representa o relacionamento de muitos para um*/
	 public function user_funcao(){
         return $this->belongsTo(User::class);
     }
}
