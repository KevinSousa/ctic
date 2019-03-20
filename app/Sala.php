<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"salas";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['cham_id','cham_funcionario','cham_sala', 'cham_equip', 'champ_tipo_problema'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['cham_grau_urgencia', 'cham_descricao'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['cham_data_chamado', 'cham_data_prevista'];
		
	/*Função que representa o relacionamento de muitos para um*/
	 public function cham_sala(){
         return $this->hasMany(Chamado::class);
     } 
}
