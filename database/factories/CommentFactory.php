<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $product = App\Product::pluck('product_id')->toArray();
    return [
        'body' => $faker->sentence,
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($product),
        'replay' => $faker->sentence,
        'user_id2' => $faker->randomElement($users),
    ];
});
