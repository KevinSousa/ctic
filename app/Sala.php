<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Sala extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"salas";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['sala_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['sala_identificacao', 'sala_andar'];

	/*nome dos atributos que representam as horas*/
	public $timestamps = false;
		
	/*Função que representa o relacionamento de muitos para um*/
	 public function cham_sala(){
         return $this->hasMany(Chamado::class);
     } 
     /*Função que representa o relacionamento de muitos para um*/
     public function event_sala(){
        return $this->hasMany(Chamado::class);
    }
}
