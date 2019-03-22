<?php

namespace App;

use App\User;
use App\Sala;
use App\Equipamento;
use App\Tipo_problema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Chamado extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"chamados";

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= ['cham_id','cham_user','cham_sala', 'cham_equip', 'champ_tipo_problema'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['cham_grau_urgencia', 'cham_descricao'];

	/*nome dos atributos que representam as horas*/
	protected $date 	= ['cham_data_chamado', 'cham_data_prevista'];
    
    /*Função que representa o relacionamento de muitos para um*/
	  public function cham_user(){
         return $this->belongsTo(User::class);
     }      

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_sala(){
         return $this->belongsTo(Sala::class);
     } 

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_equip(){
         return $this->belongsTo(Equipamento::class);
     }

     /*Função que representa o relacionamento de um para muitos*/
	  public function cham_tipo_probl(){
         return $this->belongsTo(Tipo_problema::class);
     }    
     
}
