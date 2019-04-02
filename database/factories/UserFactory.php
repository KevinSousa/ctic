<?php

use Faker\Generator as Faker;
use App\Funcao;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'user_name' => $faker->name,
        'user_cpf' => '12345678912',
        'user_telefone' => $faker->phoneNumber,
        'user_numero_siap' => $faker->phoneNumber,
        'user_email' => $faker->unique()->safeEmail,
        'user_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => Funcao::get()->random()->funcao_id,
    ];
});
