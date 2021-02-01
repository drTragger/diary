<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = ['group_id', 'start', 'end'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function days()
    {
        return $this->hasMany(Day::class, 'schedule_id');
    }
}
