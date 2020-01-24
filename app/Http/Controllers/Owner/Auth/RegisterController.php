<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Owner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use \Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/owner';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function guard()
    {
        return Auth::guard('owner');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'description' => 'text|max:500',
            'picture_path' => 'string|max:500',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {

        return Owner::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'tel' => $data['tel'],
            'zipcode' => $data['zipcode'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegisterForm()
    {
        return view('owner.auth.register');  // 管理者用テンプレート
    }
}
