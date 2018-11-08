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

trait HasLocation
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function location(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Location::class, 'location');
    }

    public function addLocation($data): Model
    {
        return $this->location()->create($data);
    }

    public function updateLocation($data): int
    {
        return $this->location()->update($data);
    }
}