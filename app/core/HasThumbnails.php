<?php
/**
 * Created by PhpStorm.
 * User: pgurajena
 * Date: 10/10/2018
 * Time: 12:21 PM
 */

namespace App\core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasThumbnails
{

    protected static function bootHasThumbnails()
    {

        static::addGlobalScope('thumbnail_count', function (Builder $builder) {
            $builder->withCount('thumbnails');
        });
    }

    public function thumbnails(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Thumbnail::class, 'thumbnail');
    }

    public function addThumbnail($path): \Illuminate\Database\Eloquent\Model
    {
        return $this->thumbnails()->create(['path' => $path]);
    }
}