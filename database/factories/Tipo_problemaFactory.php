<?php

use Faker\Generator as Faker;
use App\Tipo_problema;

$factory->define(Tipo_problema::class, function (Faker $faker) {
    return [
    'probl_tipo' => $faker->name  
    ];
});
