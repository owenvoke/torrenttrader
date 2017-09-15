<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Faq::class, function (Faker $faker) {
    return [
        'category' => function () {
            return factory(App\FaqCategory::class)->create()->id;
        },
        'question' => $faker->realText(),
        'answer' => $faker->realText()
    ];
});
