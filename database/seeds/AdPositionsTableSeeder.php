<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        \App\AdPosition::create([
            'name' => '首页banner',
            'width' => '1920',
            'height' => '520',
            'system_default' => true,
        ]);
        \App\AdPosition::create([
            'name' => '内页banner',
            'width' => '1920',
            'height' => '600',
            'system_default' => true,
        ]);
    }
}
