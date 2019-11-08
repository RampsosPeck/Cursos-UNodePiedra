<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Level::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
