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
                'name' => 'admin',
                'email' => '89016230@qq.com',
                'password' => Hash::make('admin'),
                'is_super' => true
            ]
        );
    }
}
