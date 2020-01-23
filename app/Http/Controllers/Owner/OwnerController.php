<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Owner;
use \Auth;
use App\Event;


class OwnerController extends Controller
{
    public function index()
    {
        return view('sakagura.index');
    }

    public function mypage()
    {
        $owner = Owner::find(Auth::guard('owner')->user()->id);
        // $events = Event::all();
        $events = Event::where("owner_id", Auth::guard('owner')->user()->id)->get();

        return view('sakagura.mypage',[
            'owner' => $owner,
            'events' => $events,
        ]);
    }

}
