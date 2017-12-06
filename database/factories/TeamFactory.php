<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'title'   => $faker->unique()->colorName.' Team',
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
