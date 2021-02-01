<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = ['group_id', 'start_at', 'end'];

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function days()
    {
        return $this->hasMany(Day::class, 'schedule_id');
    }
}
