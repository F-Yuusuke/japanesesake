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
        $user = Auth::user();
        $user->load('goingEvents');

        return view('/mypage', ['user' => $user]);
    }
}
