<?php

use Faker\Generator as Faker;
use App\Chamado;
use App\User;
use App\Sala;
use App\Equipamento;
use App\SublistaTipoProblema;
	
	$factory->define(App\Chamado::class, function (Faker $faker) {
    $numMat   = $faker->numberBetween($min = 1000, $max = 9999);
    $random = $faker->randomLetter.$faker->numberBetween(1, 3); 
		
	    return [
	    	
	        'cham_grau_urgencia' => $faker->randomElement($array = array('BAIXO','MÉDIO','ALTA')),
	        'cham_data_prevista' => date($format = 'Y-m-d'),
	        'cham_descricao' => $faker->name,
	        'cham_user' =>   User::get()->random()->user_id,
	        'cham_sala' =>  Sala::get()->random()->sala_id,
	        'cham_equip' => Equipamento::get()->random()->equip_tombamento, 
	       	'cham_sublista_problema' =>  SublistaTipoProblema::get()->random()->sub_id,
	    ];
	});
    