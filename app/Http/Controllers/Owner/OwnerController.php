<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Owner;
use \Auth;
use App\Event;


class OwnerController extends Controller
{
    public function mypage()
    {
        $owner = Owner::find(Auth::guard('owner')->user()->id);

        // $events = Event::all();
        $events = Event::where("owner_id", Auth::guard('owner')->user()->id)->get();

        return view('owner.mypage',[
            'owner' => $owner,
            'events' => $events,
        ]);
    }

}
