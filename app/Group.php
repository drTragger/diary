<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['id', 'name', 'description', 'owner_id', 'status' , 'date_created'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
