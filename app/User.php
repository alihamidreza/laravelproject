<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles()->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->level == 'admin' ? true : false;
    }

    public function activationCode()
    {
        return $this->hasMany(ActivationCode::class);
    }
}
