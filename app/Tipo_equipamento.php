<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Tipo_equipamento extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"tipo_equipamentos";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['tipo_id'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['tipo_nome'];
	
	/*Função que representa o relacionamento de muitos para um*/
	  public function equip_tipo_equip(){
        return $this->belongsTo(Equipamento::class);
 	}  	

 	/*Função que representa o relacionamento de muitos para um*/
	  public function cham_tipo_probl(){
         return $this->belongsTo(Chamado::class);
     }
}
