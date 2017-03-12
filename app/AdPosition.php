<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPosition extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'width',
        'height',
        'is_blank',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function  ads()
    {
        return $this->hasMany('App\Ad', 'position_id', 'id');
    }
}
