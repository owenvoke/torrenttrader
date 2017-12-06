<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\TorrentTag::class, function (Faker $faker) {
    return [
        'torrent_id' => function () {
            return factory(App\Torrent::class)->create()->id;
        },
        'tag_id'     => function () {
            return factory(App\Tag::class)->create()->id;
        },
    ];
});
