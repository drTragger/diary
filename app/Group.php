<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Group extends Model
    {
        const ACTIVE = 1;
        const INACTIVE = 2;
        
        protected $fillable = ['name', 'description', 'owner_id', 'status',];
        public function user()
        {
            return $this->belongsTo('App\User', 'owner_id');
        }
    }
