<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Owner\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Http\Controllers\Owner\Auth\OwnerMyPageController;
use App\Http\Controllers\Owner\Auth\owner;

class OwnerMyPageController extends Controller
{
    public function index()
    {
        $owner = owner::all(); 
        return Redirect::to('/sakagura');
    }
}
