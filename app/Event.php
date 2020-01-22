<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'date', 'place', 'price', 'owner_id', 'picture_path'
    ];

    public function event_user()
    {
        return $this->belongsToMany('App\userz', 'event_users')->withTimestamps();
    }
}
