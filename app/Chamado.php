<?php

namespace App;

use App\User;
use App\Sala;
use App\Equipamento;
use App\SublistaTipoProblema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Chamado extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"chamados";
    
    /*nome da chave primaria da tabela*/
    protected $primaryKey = 'cham_id';

	/*nome dos atributos que não poderão ser alterados*/
	protected $guarded	= ['cham_user','cham_sala', 'cham_equip', 'cham_sublista_problema'];

	/*nome dos atributos que poderão ser alterados*/
	protected $fillable = ['cham_grau_urgencia', 'cham_descricao', 'cham_status'];

	/*nome dos atributos que representam as horas 	*/
	protected $date = ['cham_data_chamado', 'cham_data_prevista'];
    
    public $timestamps = false;
        
   

    public $updated_at = false;
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
	  public function cham_sublista_problema(){
         return $this->belongsTo(SublistaTipoProblema::class);
     }    
     
}
