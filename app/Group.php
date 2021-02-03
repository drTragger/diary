<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 2;
    const CANCELLED = 3;

    protected $fillable = ['name', 'description', 'owner_id', 'status',];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\User', 'users_groups', 'group_id', 'user_id')->withPivot('status');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task', 'group_id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'group_id');
    }
}
