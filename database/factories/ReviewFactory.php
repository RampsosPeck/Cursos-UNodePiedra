<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Review::class, function (Faker $faker) {
    return [
        'course_id' => Unopicursos\Course::all()->random()->id,
        'rating' => $faker->randomFloat(2, 1, 5)
    ];
});
