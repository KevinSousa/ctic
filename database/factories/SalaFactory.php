<?php

use Faker\Generator as Faker;
use App\Sala;


$factory->define(Sala::class, function (Faker $faker) {
	$random = $faker->randomLetter.$faker->numberBetween(1, 5); 
    return [
        'sala_identificacao' => $random,
        'sala_andar' => $faker->randomElement(['BLOCO A','BLOCO B', 'BLOCO C'])
    ];
});
