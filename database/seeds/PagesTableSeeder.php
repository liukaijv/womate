<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $default_pages = [
            '公司介绍',
            '企业文化',
            '企业荣誉',
        ];
        foreach ($default_pages as $index) {
            $title = $faker->text(random_int(20, 50));
            \App\Page::create([
                'title' => $index,
//                'slug' => str_slug($title),
                'content' => $faker->paragraph(5),
                'system_default' => true,
            ]);
        }

        \App\Page::create([
            'title' => '联系我们',
//            'slug' => str_slug($title),
            'content' => $faker->paragraph(5),
            'system_default' => true,
            'in_sidebar' => false,
        ]);

//        foreach (range(1, 20) as $index) {
//            $title = $faker->text(random_int(20, 50));
//            \App\Page::create([
//                'title' => $title,
//                'slug' => str_slug($title),
//                'content' => $faker->paragraph(),
//            ]);
//        }
    }
}
