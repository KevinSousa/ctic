<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SublistaTipoProblema extends Model
{
    /*nome da tabela*/
	protected $table 	= 	"sublista_tipo_problemas";
    
    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'sub_id';

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['sub_nome','sub_probl'];
    
    /*Função que representa o relacionamento de muitos para um*/
	public function sub_tipo_probl(){
         return $this->belongsTo(Tipo_problema::class);
     }
}
