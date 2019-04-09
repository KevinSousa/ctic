<?php

namespace App;

use App\Tipo_equipamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Equipamento extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"equipamentos";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'id';

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= [''];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['equip_marca', 'equip_tombamento','equip_tipo'];

		/*nome dos atributos que representam as horas*/
	public $timestamps = false;

	
    /*Função que representa o relacionamento de um para muitos*/
	  public function equip_tipo_equip(){
        return $this->hasMany(Tipo_equipamento::class);
 	}

 	/*Função que representa o relacionamento de muitos para um*/
	  public function cham_equip(){
         return $this->hasMany(Chamado::class);
     }  
}
