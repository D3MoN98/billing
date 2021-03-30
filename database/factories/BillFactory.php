<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bill;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'added_by' => 1,
        'user_id' => rand(11, 14),
        'service_id' => rand(1, 3),
        'service_time' => rand(1, 5),
        'price' => rand(100, 1000),
        'is_gst' => rand(0, 1),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Kolkata'),
        'updated_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = 'Asia/Kolkata'),
    ];
});