<?php

use Faker\Generator as Faker;
use App\Funcao;

$factory->define(App\User::class, function (Faker $faker) {
   
    $cpf        = $faker->unique()->numberBetween($min = 10000000000, $max = 99999999999);
   
    $numMat     = $faker->numberBetween($min = 1000, $max = 9999);
    $letter1  = $faker->randomLetter;
    $letter2  = $faker->randomLetter;
    $Mat  = $letter1.$letter2.$numMat; 
   
    return [
        'user_name' => $faker->name,
        'user_cpf' => $cpf,
        'user_telefone' => $faker->phoneNumber,
        'user_siap_matricula' => $Mat,
        'user_email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => Funcao::get()->random()->funcao_id,
    ];
});
