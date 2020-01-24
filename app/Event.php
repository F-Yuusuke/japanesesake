<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function event_user()
    {
        return $this->belongsToMany('App\User', 'event_users', 'user_id', 'event_id')->withTimestamps();
    }
}
