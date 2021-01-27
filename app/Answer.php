<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['owner_id', 'content', 'group_id', 'task_id', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }
}
