<?php

use Faker\Generator as Faker;
use app\Tipo_equipamento;

$factory->define(App\Tipo_equipamento::class, function (Faker $faker) {
    return [
        'tipo_nome' => $faker->randomElement(['Hardware','Software', 'Rede']),
    ];
});
