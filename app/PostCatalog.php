<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCatalog extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'catalog_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalog()
    {
        return $this->belongsTo('App\PostCatalog', 'parent_id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNews($query)
    {
        return $query->where('id', '!=', 3);
    }
}
