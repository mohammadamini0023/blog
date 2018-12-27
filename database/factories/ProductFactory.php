<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $city = App\City::pluck('city_id')->toArray();
    return [
        'title_product' => $faker->name,
        'pprice' => $faker->randomNumber(2),
        'user_id' => $faker->randomElement($users),
        'pcity' => $faker->randomElement($city),
        'body_product' => $faker->sentence,
        'sale_goods' => $faker->numberbetween(0,1),
        'expiration'=>$faker->numberbetween(1,3),
        'confirm_manager'=>$faker->numberbetween(0,1),
        'sale_goods'=>$faker->numberbetween(0,1),
    ];
});
