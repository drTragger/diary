<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id', 'teacher_id', 'group_id', 'name', 'content', 'date_created', 'date_created'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
