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
        if($this->role == 'admin')
        {
            return '<span class="badge badge-danger">ADMIN<span>';
        } else if($this->role == 'user')
        {
            return '<span class="badge badge-warning">USER<span>';
        } else {
            return '<span class="badge badge-light">Not Have Role<span>';
        }
    }
}
