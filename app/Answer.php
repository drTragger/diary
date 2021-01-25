<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['id', 'owner_id', 'content', 'group_id', 'task_id', 'date_created', 'date_updated'];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function checkedAnswer()
    {
        return $this->hasOne('App\Checked_answers', 'answer_id');
    }
}
