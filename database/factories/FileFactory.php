<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\File::class, function (Faker $faker) {
    return [
        'torrent' => function () {
            return factory(\App\Torrent::class)->create()->id;
        },
        'path' => $faker->file(),
        'size' => mt_rand()
    ];
});
