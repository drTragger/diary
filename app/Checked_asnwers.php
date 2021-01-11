<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checked_asnwers extends Model
{
    protected $fillable = ['id', 'teacher_id', 'answer_id', 'group_id', 'content', 'score', 'date_created', 'date_update'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
