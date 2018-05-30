<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberbetween(1,25),
        'category' => $faker->name,
        'description' => $faker->name,
    ];
});
