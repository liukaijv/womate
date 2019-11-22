<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * @var array
     */
    protected $casts = [
        'disabled' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'catalog_id',
        'description',
        'price',
        'price_display',
        'subscription',
        'options',
        'content',
        'cover_image',
        'sort',
        'disabled',
        'is_recommend',
    ];

    /**
     * @param $value
     */
    public function  setOptionsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['options'] = json_encode($value);
        } else {
            $this->attributes['options'] = $value;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getOptionsAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catalog()
    {
        return $this->belongsTo('App\ProductCatalog', 'catalog_id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeRecommend($query){
        return $query->where('is_recommend', true);
    }
}
