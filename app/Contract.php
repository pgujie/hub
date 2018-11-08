<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed end_date
 * @property mixed start_date
 * @property mixed amount
 * @property mixed balance
 */
class Contract extends Model
{
    protected $guarded = [];

    protected $appends = ['days'];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function getDaysAttribute()
    {
        return $this->end_date->diffInDays($this->start_date);
    }

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Room::class , 'room_id', 'id');
    }

    public function request(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Request::class , 'request_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }


}
