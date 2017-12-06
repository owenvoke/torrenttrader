<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Torrent::class, function (Faker $faker) {
    return [
        'info_hash'   => sha1(mt_rand()),
        'title'       => $faker->realText(),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'user_id'     => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
