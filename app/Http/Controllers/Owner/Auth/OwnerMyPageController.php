<?php

namespace App\Http\Controllers\Owner\Auth;

// use App\Http\Controllers\Owner\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owner;
use \Auth;

class OwnerMyPageController extends Controller
{
    public function index()
    {
        // $owners = Owner::all();
        $auths = Auth::owner();
        // dd($owners);
        return view('owner.mypage', [
                     // ☝️はここで処理をした情報をどのviewに渡すかの道しるべを書いている
            'auths' => $auths,  
            'owners' => $owners,
            'hoge' => 3
        ]);
    }
}
