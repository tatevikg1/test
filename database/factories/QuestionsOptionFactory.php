<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\QuestionsOption;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(QuestionsOption::class, function (Faker $faker) {
    return [
        'question_id' => $faker->numberBetween($min = 1, $max = 15),
        'option' => $faker->sentence,
        'point'=>$faker->numberBetween($min = 0, $max = 1),
    ];
});
