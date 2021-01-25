<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['teacher_id', 'group_id', 'name', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'task_id');
    }
}
