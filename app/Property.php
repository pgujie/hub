<?php

namespace App;

use App\core\HasLocation;
use App\core\HasPath;
use App\core\HasThumbnails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model implements HasPath
{
    use HasThumbnails , HasLocation;

    protected $appends = ['path','rooms_available'];

    protected $guarded = [];

    public function scopeTypeOfProperty($query, $type){
        return $query->where('type', $type);
    }

    public function getRoomsAvailableAttribute(): string
    {
        return $this->rooms_count - $this->rooms_booked;
    }

    public function getPathAttribute(): string
    {
        return '/property/'.$this->id;
    }

    public function request(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Request::class,Room::class , 'property_id','room_id','id','id');
    }

    public function addRoom($data): Model
    {
      $room = $this->rooms()->create($data);
      $this->increment('rooms_count');
      return $room;
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class,'property_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomsAvailable(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->rooms()->where('state',0);
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(User::class, 'owner_id','id');
    }

    public function agent() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id','id');
    }

}
