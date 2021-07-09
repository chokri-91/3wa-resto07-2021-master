<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderLine;
use App\Order;
use App\Meal;
use Faker\Generator as Faker;

$factory->define(OrderLine::class, function (Faker $faker) {
    return [
        'created_at' => now(),
        'meal_id' => Meal::get('id')->random(),
        'order_id' => Order::get('id')->random(),
        'quantity_ordered' => $faker->randomDigitNotNull,
        'price_each' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99999),
    ];
});
