<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // factory(App\User::class, 10)->create();
        // factory(App\Topic::class, 10)->create();
        // factory(App\Question::class, 50)->create();
        // factory(App\QuestionsOption::class, 100)->create();

        // $now  = Carbon\Carbon::now()->toDateTimeString();

        App\User::create([
            'name' => "Admin",  //$faker->name,
            'email' => "admin@gmail.com",  //$faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'admin' => true,
            'remember_token' => Str::random(10),
        ]);

    }
}
