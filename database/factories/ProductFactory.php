<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'pprice' => $faker->randomNumber(2),
        'category' => $faker->lexify('category ???'),
        'user_id' => $faker->randomElement($users),
        'color' => $faker->colorName,
        'description' => $faker->sentence,
        'shipping_goods' => $faker->boolean,
        'expiration_at'=>$faker->dateTimeInInterval($startDate = 'now', $interval = '+ 1 days', $timezone = null),
    ];
});
