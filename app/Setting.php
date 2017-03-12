<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'value'];

    /**
     * @param bool $cache
     * @return \Illuminate\Support\Collection
     */
    public static function getSettings($cache = true)
    {
        if ($cache == true) {
            return \Cache::rememberForever('setting_array', function () {
                $settings = \App\Setting::all()->pluck('value', 'name');
                return $settings;
            });
        } else {
            $settings = \App\Setting::all()->pluck('value', 'name');
            return $settings;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getSetting($name)
    {
        $settings = self::getSettings();
        return $settings[$name];
    }
}
