<?php

use Faker\Generator as Faker;

$factory->define(App\Find::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberbetween(1,25),
        'find' => $faker->name,
    ];
});
