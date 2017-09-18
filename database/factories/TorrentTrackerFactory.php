<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\TorrentTracker::class, function (Faker $faker) {
    return [
        'torrent_id' => function () {
            return factory(App\Torrent::class)->create()->id;
        },
        'tracker_id' => function () {
            return factory(App\Tracker::class)->create()->id;
        },
        'seeds' => mt_rand(),
        'leechers' => mt_rand(),
        'completed' => mt_rand()
    ];
});
