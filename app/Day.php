<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 2;

    protected $fillable = ['schedule_id', 'day', 'date', 'status', 'time'];

//    public function schedule() {
//        return $this->hasOne(Schedule::class, 'schedule_id');
//    }
}
