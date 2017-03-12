<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'department',
        'address',
        'content',
        'number',
    ];
}
