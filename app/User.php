<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'role', 'nrp', 'avatar'
    ];

    public function bunga()
    {
        return $this->hasOne(Bunga::class);
    }

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

    public function getImgProfileAttribute()
    {
        return "/storage/".$this->avatar;
    }
    public function getRoleSectionAttribute()
    {
        if($this->role == '0')
        {
            return 'ADMIN';
        } else if($this->role == '1')
        {
            return 'PENGELOLA';
        } else if($this->role == '2')
        {
            return 'USER';
        } else if($this->role == '3')
        {
            return 'ENDUSER';
        } else {
            return 'Not Have Role';
        }
    }
}
