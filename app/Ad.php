<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'position_id',
        'name',
        'description',
        'image',
        'url',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\AdPosition', 'position_id', 'id');
    }
}
