<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('index','store');

    }

    public function index(){
        return view('login.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = true ;
        if (! auth()->attempt($credentials, $remember )) {
            return back()->withErrors(['message'=>'Email and Password doesn\'t match']);

        }
        auth()->user()->last_log_at = now();
        auth()->user()->update([
            'last_log_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
        return redirect()->home();
    }


    public function destroy()
    {
        auth()->logout();
        return redirect('');
    }
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }

}
