<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'created_at' => now(),
        'user_id' => User::get('id')->random(),
        'total_amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99999),
        'tax_rate' => 20,
        'tax_amount' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 9999),
    ];
});
