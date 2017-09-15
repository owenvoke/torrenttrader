<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Torrent::class, function (Faker $faker) {
    return [
        'info_hash' => sha1(mt_rand()),
        'name' => str_random(20)
    ];
});
