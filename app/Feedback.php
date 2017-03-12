<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'service_id',
        'name',
        'mobile',
        'remark',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\ProductCatalog', 'service_id', 'id');
    }
}
