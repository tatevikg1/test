<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'topic_id' => $faker->numberBetween($min = 14, $max = 19),
        'question' => $faker->sentence,
        'point' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
