<?php

use Faker\Generator as Faker;
use app\Equipamento;
use app\Tipo_equipamento;

$factory->define(App\Equipamento::class, function (Faker $faker) {
    return [
        'equip_tipo' => Tipo_equipamento::get()->random()->tipo_id,
        'equip_marca' => $faker->randomElement(['LG','Samsung', 'Motorola', 'CCE', 'Xaomi']),
        'equip_tombamento' => $faker->ean8,
    ];
});
