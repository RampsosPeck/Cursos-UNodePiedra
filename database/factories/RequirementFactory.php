<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Requirement::class, function (Faker $faker) {
    return [
        'course_id' => Unopicursos\Course::all()->random()->id,
        'requirement' => $faker->sentence
    ];
});
