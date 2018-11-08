<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['full_name'];

    protected static function boot()
    {
        parent::boot();

        // Add Account to User

        static::created(function(User $user){

            $user->account()->create([
                'type' => 'user-account'
            ]);

        });
    }

    public function account(): \Illuminate\Database\Eloquent\Relations\HasOne
    {

        return $this->hasOne(Account::class , 'user_id', 'id' );

    }

    public function accounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Account::class , 'user_id', 'id' );

    }


    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->name .' '. $this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
       return $this->hasMany(Request::class,'user_id','id');
    }

    public function property(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class,'owner_id','id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','address','phone','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
