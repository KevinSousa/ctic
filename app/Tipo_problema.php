<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tipo_problema extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"tipo_problemas";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['probl_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['probl_tipo'];

	/*Função que representa o relacionamento de muitos para um*/
	  public function cham_tipo_probl(){
         return $this->belongsTo(Chamado::class);
     }	
}
