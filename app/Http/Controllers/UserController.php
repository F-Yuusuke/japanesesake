<?php

namespace App\Http\Controllers;
use App\User;
use \Auth;
use App\Event_user;
use App\Event;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = User::find(Auth::guard('user')->user()->id);
        // $events = Event_user::where("user_id", Auth::guard('user')->user()->id)->get();
        // $events = Event::with('event_user')->get();
        $events = Event_user::where('user_id', Auth::id())->with('event')->get();
        // dd($events);
        // foreach ($events as $event) {
        //     dd($event->user_id, $event, $event->event);
        // }


        // dd($events, Auth::id());

        dd($events);
        return view('/mypage', [
            'user' => $user,
            'events' => $events,
        ]);
    }
}
