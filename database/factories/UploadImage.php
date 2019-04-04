<?php

use Faker\Generator as Faker;

$product = App\Product::get()->toArray();

$factory->define(App\Upload_image::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomElement($product->product_id),
        'path' => '1533510282.jpg',
    ];
});
