<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Aged Brie', 'Backstage passes to a TAFKAL80ETC concert', 'Conjured', $faker->realText(10)]),
        'sell_in' => $faker->numberBetween(-10, 10),
        'quality' => $faker->numberBetween(0, 50)
    ];
});
