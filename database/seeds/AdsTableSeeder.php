<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
//        $ad_position = App\AdPosition::first();
//        foreach (range(1, 2) as $index) {
//            App\Ad::create([
//                'position_id' => $ad_position->id,
//                'name' => $faker->text(random_int(20, 30)),
//                'image' => $faker->imageUrl($ad_position->width, $ad_position->height),
//            ]);
//        }
        App\Ad::create([
            'position_id' => 1,
            'name' => '沃玛特的核心价值理念',
            'description' => '真诚是公司经营管理、员工做人做事的基本原则。我们倡导真诚待人，要真挚坦诚的对待同事，获得同事的尊重。',
            'image' => 'images/1.jpg',
            'url' => '/',
        ]);
        App\Ad::create([
            'position_id' => 1,
            'name' => '沃玛特网站上线了',
            'description' => '沃玛特服务产业有限公司是一家将英式管家服务引入企业，并结合中国国情创立的御侍管家服务公司。',
            'image' => 'images/2.jpg',
            'url' => '/',
        ]);
        App\Ad::create([
            'position_id' => 2,
            'name' => '内页banner图',
            'image' => 'images/bg-parallax4.jpg',
        ]);
    }
}
