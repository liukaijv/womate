<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'catalog_id',
        'description',
        'content',
        'cover_image',
        'visible'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'visible_display'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'visible' => 'boolean'
    ];

    /**
     * @return string
     */
    public function getVisibleDisplayAttribute()
    {
        return $this->getAttribute('visible') == true ? '是' : '否';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalog()
    {
        return $this->belongsTo('App\PostCatalog', 'catalog_id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNews($query)
    {
        return $query->where('catalog_id', '!=', 3);
    }
}
