<?php

namespace App;

use App\Funcao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Funcionario extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"funcionarios";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['func_id','func_funcao'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['func_name', 'func_cpf', 'func_numero_siap'];
	
    /*Função que representa o relacionamento de um para muitos*/
	 public function func_funcao(){
         return $this->hasMany(Funcao::class);
     }    	

     /*Função que representa o relacionamento de muitos para um*/
	  public function cham_func(){
         return $this->belongsTo(Chamado::class);
     }
}
