<?php

use Faker\Generator as Faker;

$factory->define(App\Bidding::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $product = App\Product::pluck('product_id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($product),
        'bprice' => $faker->randomNumber(5),
        
    ];
});
