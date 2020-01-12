<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SakaguraController extends Controller
{
    public function index()
    {
        return view('sakagura.index');
    }
}
