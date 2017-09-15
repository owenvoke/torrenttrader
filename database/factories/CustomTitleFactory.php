<?php

use Faker\Generator as Faker;

/** @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CustomTitle::class, function (Faker $faker) {
    return [
        'title' => ' Custom' . $faker->jobTitle
    ];
});
