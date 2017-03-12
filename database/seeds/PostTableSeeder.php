<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $catalog_ids = App\PostCatalog::all()->pluck('id')->toArray();
        foreach (range(1, 25) as $index) {
            $title = $faker->text(random_int(20, 50));
            App\Post::create([
                'catalog_id' => $faker->randomElement($catalog_ids),
                'title' => $title,
                'slug' => str_slug($title),
                'description' => $faker->text(),
                'content' => $faker->paragraph(),
                'cover_image' => $faker->imageUrl(),
            ]);
        }
    }
}
