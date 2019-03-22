<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcao extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"funcaos";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['funcao_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['funcao_nome'];
		
	/*Função que representa o relacionamento de muitos para um*/
	 public function user_funcao(){
         return $this->belongsTo(User::class);
     }
}
