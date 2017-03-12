<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecruitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $departments = [
            'technology',
            'product',
            'design',
            'operation',
        ];
        foreach (range(1, 15) as $index) {
            App\Recruit::create([
                'name' => $faker->jobTitle(),
                'department' => $faker->randomElement($departments),
                'address' => $faker->address(),
                'content' => $faker->paragraph(),
            ]);
        }
    }
}
