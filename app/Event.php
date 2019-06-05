<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	/*nome da tabela*/
	protected $table 	= 	"events";

    /*nome da chave primaria da tabela*/
	protected $primaryKey = 'id';

	/*nome dos atributos que poderão ser não alterados*/
	protected $guarded	= [''];

	/*nome dos atributos que poderão ser alterados*/
   protected $fillable = ['event_name','description','start_date','end_date'];
 
}
