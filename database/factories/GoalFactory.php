<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Goal::class, function (Faker $faker) {
    return [
        'course_id' => Unopicursos\Course::all()->random()->id,
        'goal' => $faker->sentence
    ];
});
