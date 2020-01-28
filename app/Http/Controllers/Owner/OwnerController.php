<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use \Auth;


class OwnerController extends Controller
{
    public function mypage()
    {
        $owner = Auth::user();
        $owner->load('events');

        return view('owner.mypage',['owner' => $owner,]);
    }
}
