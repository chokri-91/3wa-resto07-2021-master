<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'photo' => $faker->imageUrl(640, 480, 'food'),
        'description' => $faker->sentence,
        'quantity' => $faker->randomDigitNotNull,
        'buy_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99999),
        'sale_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99999),
        'created_at' => now(),
    ];
});
