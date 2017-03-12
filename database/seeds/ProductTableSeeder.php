<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $catalogs = App\ProductCatalog::all()->pluck('id')->toArray();
        $options = [
            '员工类别' => '优秀',
            '顾客满意率' => '99%',
        ];
        foreach (range(1, 15) as $index) {
            App\Product::create([
                'name' => $faker->jobTitle(),
                'catalog_id' => $faker->randomElement($catalogs),
                'description' => $faker->text(random_int(20, 40)),
                'description' => $faker->text(random_int(20, 40)),
                'price' => random_int(100, 300),
                'subscription' => random_int(100, 300),
                'options' => $options,
                'content' => $faker->paragraph(),
                'cover_image' => $faker->imageUrl(),
            ]);
        }
    }
}
