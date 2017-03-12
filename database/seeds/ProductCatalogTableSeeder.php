<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductCatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
//        foreach (range(1, 5) as $index) {
//            App\ProductCatalog::create([
//                'name' => $faker->randomElement(['house cleaning', 'baby sitter']),
//            ]);
//        }

        $data = [
            '家庭保洁',
            '搬家搬厂',
            '家电洗修拆',
            '洗涤维护',
            '外墙清洗',
        ];

        foreach ($data as $value) {
            App\ProductCatalog::create([
                'name' => $value
            ]);
        }

    }
}
