<?php

namespace App\core;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    protected $guarded = [];

    public function owner(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
