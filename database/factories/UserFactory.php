<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'family' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->numberbetween(111111,99999999), // secret
        'phone' => $faker->numberbetween(111111,9999999),
        'adress' => $faker->name,
        'coin' => $faker->numberbetween(5,20),

        
    ];
});
