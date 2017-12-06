<?php

use Faker\Generator as Faker;

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Acl::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
    ];
});
