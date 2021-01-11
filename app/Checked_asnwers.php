<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checked_asnwers extends Model
{
    protected $fillable = [];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
