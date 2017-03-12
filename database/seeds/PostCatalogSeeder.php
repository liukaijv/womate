<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
//        foreach (range(1, 10) as $index) {
//            \App\PostCatalog::create([
//                'name' => $faker->word(),
//                'description' => $faker->text(),
//            ]);
//        }
        $data = [
            '企业动态',
            '行业动态',
            '帮助中心',
        ];

        foreach ($data as $value) {
            App\PostCatalog::create([
                'name' => $value,
                'description' => $faker->text(),
                'system_default' => true,
            ]);
        }
//        $parent_ids = \App\PostCatalog::where('parent_id', 0)->pluck('id')->toArray();
//        foreach (range(1, 10) as $index) {
//            \App\PostCatalog::create([
//                'parent_id' => $faker->randomElement($parent_ids),
//                'name' => $faker->word(),
//                'description' => $faker->text(),
//            ]);
//        }
    }
}
