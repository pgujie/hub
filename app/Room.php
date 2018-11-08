<?php

namespace App;

use App\core\HasPath;
use App\core\HasThumbnails;
use App\core\RoomExtended;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed property
 * @property mixed occupants_left
 *@property mixed user_booked
 */

class Room extends Model implements HasPath
{

    use HasThumbnails;

    protected $guarded = [];

//    protected $appends = [ 'user_booked', 'fully_booked','occupants_left'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('request_count', function (Builder $builder) {
            $builder->withCount('requests');
        });

        static::addGlobalScope('rooms_available_count', function (Builder $builder) {
            $builder->withCount('requestsByUser');
        });

    }

    /**
//     * @param Builder $builder
//     * @return \Illuminate\Database\Eloquent\Builder
//     */

    public function scopeRequestCount(Builder $builder){

        return $builder->withCount('requests')->where('state',0)->orWhere('state',1);
    }

    /**
     * @param Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserBooked(Builder $builder){

        return $builder->withCount('requestsByUser')->where('state',0)->orWhere('state',1);
    }


    public function getUserBookedAttribute(): bool
    {
        return (bool) $this->requests_by_user_count > 0;
    }

    public function getFullyBookedAttribute(): bool
    {
        return(boolean)$this->state;
    }

    public function getOccupantsLeftAttribute(): int
    {
        $diff =(int)$this->number_of_occupants - (int)$this->requests_count;
        return $diff < 1 ? 0 : $diff ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Request::class,'room_id','id')

            ->where(function(Builder $builder){

                $builder->orWhere('request_state',0);
                $builder->orWhere('request_state',1);

            });

    }

    public function contracts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Contract::class,'room_id','id');
    }

    public function requestsByUser(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->requests()->where('user_id', auth()->id() )->where('request_state',0);
    }

    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class , 'property_id' , 'id');
    }

    public function getPathAttribute() : string
    {
        return '/rooms/'.$this->id;
    }
}
