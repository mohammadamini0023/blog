<?php

use Faker\Generator as Faker;


$product = App\Product::pluck('product_id')->toArray();

$factory->define(App\Upload_image::class, function (Faker $faker) use($product) {

    return [
        'product_id' => $faker->randomElement($product),
        'path' => '1533510282.jpg',
    ];
});
