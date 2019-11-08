<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Student::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'title' => $faker->jobTitle
    ];
});
