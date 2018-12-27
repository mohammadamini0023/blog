<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Category::class, function (Faker $faker) {
    return [

        'category' => $faker->name,
        'parent_id' => $faker->numberbetween(0,5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
