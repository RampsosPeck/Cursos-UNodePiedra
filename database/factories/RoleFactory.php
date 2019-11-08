<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
