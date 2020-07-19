<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 2)->create();
        factory(App\Topic::class, 3)->create();
        factory(App\Question::class, 9)->create();
        factory(App\QuestionsOption::class, 20)->create();


    }
}
