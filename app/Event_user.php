<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_user extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
