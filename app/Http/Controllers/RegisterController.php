<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');

    }

    public function index(){
        return view('register.register');
    }
    public function store()
    {
        //validate the form
        $this->validate(\request(),[
            'name' => 'bail|required|unique:users|min:3|max:30|string',
            'email' => 'bail|required|unique:users|email',
            'password' => 'bail|required|min:8|max:30|confirmed'
        ]);

        //create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'last_log_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => request()->getClientIp()

        ]);
        session()->flash('message' , 'Thanks you for Sign Up');
        auth()->login($user);
        session()->flash('message' , 'Thanks you for Sign Up');
        return redirect('edit-profile');

    }

}
