<?php

use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
    $users = App\User::pluck('user_id')->toArray();
    $product = App\Product::pluck('product_id')->toArray();
    return [
        'quality' => $faker->numberbetween(1,5),
        'worth_buying' => $faker->numberbetween(1,5),
        'designing' => $faker->numberbetween(1,5),
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($product),
        'description' => $faker->sentence,
    ];
});
