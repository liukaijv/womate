<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'site_title',
            'value' => '沃玛特清洁服务'
        ]);

        Setting::create([
            'name' => 'site_keywords',
            'value' => '外墙清洗，家庭保洁'
        ]);

        Setting::create([
            'name' => 'site_description',
            'value' => '沃玛特服务产业有限公司是一家将英式管家服务引入企业，并结合中国国情创立的御侍管家服务公司。'
        ]);

        Setting::create([
            'name' => 'site_status',
            'value' => '1'
        ]);

        Setting::create([
            'name' => 'offline_reason',
            'value' => '网站维护中'
        ]);

        Setting::create([
            'name' => 'upload_dir',
            'value' => 'uploads'
        ]);

        Setting::create([
            'name' => 'qq',
            'value' => '865329456'
        ]);

        Setting::create([
            'name' => 'email',
            'value' => '865329456@qq.com'
        ]);

        Setting::create([
            'name' => 'mobile',
            'value' => '13950130791'
        ]);

        Setting::create([
            'name' => 'company_intro',
            'value' => '沃玛特服务产业有限公司是一家将英式管家服务引入企业，并结合中国国情创立的御侍管家服务公司。'
        ]);

        Setting::create([
            'name' => 'footer_info',
            'value' => 'Copyright © 沃玛特清洁服务, 2016. All Rights Reserved.'
        ]);

        Setting::create([
            'name' => 'address',
            'value' => '厦门市思明区黄厝村茂后159号沃玛特（厦门）清洁服务有限公司'
        ]);

        Setting::create([
            'name' => 'sina_weibo',
            'value' => '/'
        ]);

        Setting::create([
            'name' => 'tencent_weibo',
            'value' => '/'
        ]);


    }
}
