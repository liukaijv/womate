<?php

use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Feedback::create([
            'name' => '小郭',
            'mobile' => '15680766916',
            'remark' => '我要打扫房间',
        ]);
    }
}
