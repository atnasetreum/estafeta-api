<?php

use Faker\Generator as Faker;

$factory->define(App\Label::class, function (Faker $faker) {
    return [
        'id_user'    => $faker->numberBetween(1, 10),
        'guia'       => $faker->word,
    ];
});
