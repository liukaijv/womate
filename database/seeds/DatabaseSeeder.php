<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PostCatalogSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(RecruitsTableSeeder::class);
        $this->call(RecruitsTableSeeder::class);
        $this->call(AdPositionsTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(ProductCatalogTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(FeedbackTableSeeder::class);
    }
}
