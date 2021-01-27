<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->hasMany('App\Group', 'owner_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'owner_id');
    }

    public function usersGroups()
    {
        return $this->belongsToMany('App\Group', 'users_groups', 'user_id', 'group_id')->withTimestamps()->withPivot('status');
    }
}
