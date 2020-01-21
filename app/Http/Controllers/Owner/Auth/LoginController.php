<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Owner\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/sakagura/mypage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return \Auth::guard('owner');
    }


    public function showLoginForm()
    {
        return view('sakagura.auth.login'); //酒蔵ログインページのテンプレート
    }

    // public function username()
    // {
    //     return 'email';
    // }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/sakagura');  // ログアウト後のリダイレクト先
    }


}
