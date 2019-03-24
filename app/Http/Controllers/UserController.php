<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use vendor\project\StatusTest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('myarticles');

    }

    public function index()
    {
        $users =  User::orderByRaw('points desc')->take(50)->get();
        return view('users',compact('users'));
    }
    public function search()
    {

        $output = "";
        $users = User::where('name', \request('username'))
            ->orWhere('name', 'like', '%' . \request('username') . '%')->get();
        if ($users) {

            foreach ($users as $key => $user) {
                $output .=
                    '<div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4"'.
                    'onclick="'.
                    'window.location.href ='.
                    "'user?name=".$user->name.' \'"> '.
                    '<img src=' . $user->avatar . ' class="w-25 border">' .
                    '<div class="w-75 float-right text-muted pl-1">' .
                    '<p class="p-0 m-0 small text-dark">' . $user->name . '</p>' .
                    '<p class="p-0 m-0 small">' . $user->points . '</p>' .
                    '<p class="small p-0 m-0"><i class="fa fa-map-marker"></i>' . $user->country . '</p>' .
                    '</div>' . '</div>';
            }
            if ($output == ""){
                return response('No user found');
            }
            return response($output);

        }
    }

    public function user_profile()
    {

        if (User::filter(\request(['name'])) !== "not found") {

            $user = User::filter(\request(['name']))->firstOrFail();
            if (auth()->user()&&$user->name == auth()->user()->name) {
                return redirect('profile');
            } else {
                return view('user_profile', compact('user'));


            }}else{
            return redirect('user?name="not-found"');
        }
    }

    public function leaderboard()
    {
       $users = User::orderByRaw('points desc')->take(50)->get();
       $i =0;
       return view('leaderboard',compact('users'))->with('i',$i);
    }

    public function myarticles()
    {
        $articles = auth()->user()->articles()->latest()->paginate(10);

        return view('myarticles',compact('articles'));
    }
}


