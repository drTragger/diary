<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['id', 'owner_id', 'content', 'group_id', 'date_created', 'date_updated'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
