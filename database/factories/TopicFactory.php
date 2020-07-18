<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
