<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'acl_id' => function () {
            return factory(App\Acl::class)->create()->id;
        },
        'custom_title_id' => function () {
            return factory(App\CustomTitle::class)->create()->id;
        }
    ];
});
