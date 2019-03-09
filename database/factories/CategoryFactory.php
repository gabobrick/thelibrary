<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Thriller', 'Drama', 'Comedy', 'Suspense', 'Entertainment', 'Education']),
        'description' => $faker->text
    ];
});
