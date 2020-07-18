<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\Topic::class, 5)->create();
        factory(App\Question::class, 15)->create();

    }
}
