<?php

use Faker\Generator as Faker;
use App\Funcao;

$factory->define(App\User::class, function (Faker $faker) {
   
    $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));

    $cpf        = $faker->cpf;
    
    $numMat     = $faker->numberBetween($min = 1000, $max = 9999);
    $letter1  = $faker->randomLetter;
    $letter2  = $faker->randomLetter;
    $Mat  = $letter1.$letter2.$numMat; 
   
    return [
        'user_name' => $faker->name,
        'user_cpf' => $cpf,
        'user_telefone' => $faker->phoneNumber,
        'user_siap_matricula' => $Mat,
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => $faker->unique()->safeEmail,
        'password' => ' secret', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => Funcao::get()->random()->funcao_id,
    ];
});
