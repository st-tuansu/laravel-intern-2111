<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $userId = DB::table('users')->insertGetId([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
            $taskCount = rand(1, 3);
            for ($j = 0; $j < $taskCount; $j++) {
                DB::table('tasks')->insert([
                    'title' => $faker->realText($faker->numberBetween(10, 20)),
                    'description' => $faker->realText($faker->numberBetween(100, 200)),
                    'type' => $faker->numberBetween(1, 2),
                    'status' => $faker->numberBetween(1, 2),
                    'start_date' => $faker->date(now()),
                    'due_date' => $faker->dateTimeBetween('now', '+01 days'),
                    'assignee' => $userId,
                    'estimate' => $faker->randomFloat(1, 5, 0.01),
                    'actual' => $faker->randomFloat(1, 5, 0.01),
                ]);
            }
        }
    }
}
