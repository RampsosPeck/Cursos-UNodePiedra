<?php

use Faker\Generator as Faker;

$factory->define(Unopicursos\Course::class, function (Faker $faker) {
    $name = $faker->sentence;
    $status = $faker->randomElement([Unopicursos\Course::PUBLISHED, Unopicursos\Course::PENDING, Unopicursos\Course::REJECTED]);
    return [
        'teacher_id' => Unopicursos\Teacher::all()->random()->id,
        'category_id' => Unopicursos\Category::all()->random()->id,
        'level_id' => Unopicursos\Level::all()->random()->id,
        'name' => $name,
        'slug' => str_slug($name,'-'),
        'description' => $faker->paragraph,
        'picture' => \Faker\Provider\Image::image(storage_path().'/app/public/courses', 600, 350, 'business', false),
        'status' => $status,
        'previous_approved' => $status !== Unopicursos\Course::PUBLISHED ? false : true,
        'previous_rejected' => $status === Unopicursos\Course::REJECTED ? true : false ,
    ];
});
