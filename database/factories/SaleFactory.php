<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    $users = App\User::pluck('user_id')->toArray();
    $product = App\Product::pluck('product_id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($product),
        'sprice' => $faker->randomNumber(5),
        'payment_getway' => $faker->boolean,
    ];
});
