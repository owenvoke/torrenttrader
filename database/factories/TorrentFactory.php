<?php

use Faker\Generator as Faker;

$factory->define(App\Torrent::class, function (Faker $faker) {
    return [
        'info_hash' => sha1(mt_rand()),
        'name' => str_random(20)
    ];
});
