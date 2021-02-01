<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['schedule_id', 'day', 'date', 'status'];

//    public function schedule() {
//        return $this->hasOne(Schedule::class, 'schedule_id');
//    }
}
