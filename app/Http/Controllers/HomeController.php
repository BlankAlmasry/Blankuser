<?php

namespace App\Http\Controllers;

use App\Article;
use App\Message;
use Illuminate\Http\Request;
use App\Category;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('edit','profile','contactindex','contact');

    }

    public function index(){
        $articles = Article::where('is_approved',1)->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function edit(){
        return view('edit-profile');
    }
    public function profile(){
        return view('profile');
    }

    public function contactindex()
    {
     return view('contact');
    }

    public function contact()
    {
        $this->validate(\request(),[
            'subject' => 'string|required|max:120',
            'body' => 'string|required|max:1200|min:3'
        ]);

            $message = Message::create([
            'user_id' =>auth()->user()->id,
            'subject'=> request('subject'),
            'body'=> request('body')
        ]);
            session()->flash('message','Thanks For Contact');
            return back();
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories' ,compact('categories'));
    }
    public function articles()
    {
        $categories = Category::all();
        return view('articles' ,compact('categories'));
    }

    public function about()
    {
        return view('about');
    }
}
