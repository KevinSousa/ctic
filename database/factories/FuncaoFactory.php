<?php

use Faker\Generator as Faker;

$factory->define(App\Funcao::class, function (Faker $faker) {
    return [
        'funcao_name' => $faker->jobTitle
    ];
});
