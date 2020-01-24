<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'title', 'first_name', 'last_name', 'mobile', 'phone','email', 'address', 'city', 'district', 'notes', 'created_by'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function radcheckreply()
    {
        return $this->hasOne(Radcheckreply::class);
    }

    public function user_title()
    {
        return ['mr' => 'Mr', 'mrs' => 'Mrs', 'ms' => 'Ms'];
    }
}
