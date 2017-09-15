<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Tracker::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'status' => $faker->boolean()
    ];
});
