<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\FaqCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(),
        'acl_id' => function () {
            return factory(App\Acl::class)->create()->id;
        }
    ];
});
