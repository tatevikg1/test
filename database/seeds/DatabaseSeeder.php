<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 10)->create();
        factory(App\Topic::class, 10)->create();
        factory(App\Question::class, 50)->create();
        factory(App\QuestionsOption::class, 100)->create();

    }
}
