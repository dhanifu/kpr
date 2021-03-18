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
        'name', 'email', 'username', 'nrp', 'password', 'role', 'avatar', 'status_verif', 'pangkat_id'
    ];

    public function bunga()
    {
        return $this->hasOne(Bunga::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
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
        if($this->role == 0)
        {
            return 'ADMIN';
        } else if($this->role == 1)
        {
            return 'PENGELOLA';
        } else if($this->role == 2)
        {
            return 'USER';
        } else {
            return 'Not Have Role';
        }
    }
}
