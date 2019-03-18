<?php

namespace App;

use App\Funcionario;
use App\Sala;
use App\Equipamento;
use App\Tipo_problema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Chamado extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"chamados";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['cham_id','cham_funcionario','cham_sala', 'cham_equip', 'champ_tipo_problema'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['cham_grau_urgencia', 'cham_descricao'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['cham_data_chamado', 'cham_data_prevista'];
    
    /*Função que representa o relacionamento de muitos para um*/
	  public function cham_func(){
         return $this->hasMany(Funcionario::class);
     }      

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_sala(){
         return $this->hasMany(Sala::class);
     } 

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_equip(){
         return $this->hasMany(Equipamento::class);
     }

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_tipo_probl(){
         return $this->hasMany(Tipo_problema::class);
     }    
     
}
