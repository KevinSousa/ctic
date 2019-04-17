<?php

use Faker\Generator as Faker;
use App\SublistaTipoProblema;
use App\Tipo_problema;

$factory->define(App\SublistaTipoProblema::class, function (Faker $faker) {
    return [

        'sub_probl' => Tipo_problema::get()->random()->probl_id,
        'sub_nome' => $faker->randomElement(['memória','hd', 'formtação']),
    ];
});

