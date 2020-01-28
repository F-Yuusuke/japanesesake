<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use \Auth;


class OwnerController extends Controller
{
    public function mypage()
    {
        // ログインしてるユーザー取得
        $owner = Auth::user();

        // ログインしてるユーザーに紐づくイベント取得
        // eventsはApp\Ownerに書いてあるmethod名
        $owner->load('events');

        return view('owner.mypage',['owner' => $owner,]);
    }
}
