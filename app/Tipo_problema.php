<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Tipo_problema extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"tipo_problemas";
    
    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'probl_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['probl_tipo'];

	/*nome dos atributos que representam as horas*/
	public $timestamps = false;

	/*Função que representa o relacionamento de muitos para um*/
	  public function cham_tipo_probl(){
         return $this->hasMany(Chamado::class);
     }		
     /*Função que representa o relacionamento de muitos para um*/
	  public function sub_tipo_probl(){
         return $this->hasMany(SublistaTipoProblema::class);
     }	
}
