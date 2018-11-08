<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed balance
 * @property mixed room
 */
class Request extends Model
{
    protected $dates = [

        'start_date',
        'end_date'
    ];

    protected $guarded = [];

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Room::class,'room_id','id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
