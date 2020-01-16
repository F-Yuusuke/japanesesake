<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SakaguraController extends Controller
{
    public function index()
    {
        return view('sakagura.index');
    }

    public function mypage()
    {
        return view('sakagura.mypage');
    }

}
