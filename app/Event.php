<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function event_user()
    {
        return $this->belongsToMany('App\userz', 'event_users')->withTimestamps();
    }
}
