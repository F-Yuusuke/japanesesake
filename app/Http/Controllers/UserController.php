<?php

namespace App\Http\Controllers;
use App\User;
use \Auth;
use App\Event;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = User::find(Auth::guard('user')->user()->id);
        // $events = Event::where("user_id", Auth::guard('user')->user()->id)->get();

        return view('/mypage', [
            'user' => $user,
            // 'events' => $events,
        ]);
    }
}
