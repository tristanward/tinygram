<?php

namespace Tristanward\Tinygram\Models;

use Illuminate\Database\Eloquent\Model;

class Tinyimage extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'media_created_at',
    ];
}
