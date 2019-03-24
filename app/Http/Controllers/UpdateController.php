<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(){
        $this->validate(\request(),[
            'job' => 'bail|min:2|max:40|string',
            'school' => 'bail|string|min:2|max:40',
            'about' => 'required|string|min:2|max:120',
            'avatar' => 'bail|string|min:2|max:40',
            'country' => 'bail|string|min:2|max:60'
        ]);
        auth()->user()->update([
            'job' => request('job'),
            'school' => request('school'),
            'about' => request('about'),
            'avatar' => request('avatar'),
            'country' => request('country')
        ]);
        session()->flash('message' , 'Profile Updated');

        return response()->json('Profile Updated');
    }
}
