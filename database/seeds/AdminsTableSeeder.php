<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create(
            [
                'name' => 'admin111',
                'email' => '89016230@qq.com',
                'password' => Hash::make('RneLVZ2FIv'),
                'is_super' => true
            ]
        );
    }
}
