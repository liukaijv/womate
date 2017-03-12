<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'in_sidebar'
    ];
}
