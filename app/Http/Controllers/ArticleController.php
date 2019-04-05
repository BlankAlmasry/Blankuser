<?php

namespace App\Http\Controllers;
use App\Article;
use App\Tag;
use App\Vote;
use App\Comment;
use App\Reply;
use App\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ArticleController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->only('index','store','vote','comment','delete','edit','update');

    }
    public function reply($article)
    {
        $reply =  Reply::create([
            'reply' =>  request('reply'),
            'comment_id' => request('cmd'),
            'user_id' => auth()->user()->id,
        ]);

    }

    public function index()
    {
        return view('add-article');
    }
    public function store()
    {

      $this->validate(\request(),[
        'title' => 'bail|required|unique:articles|min:2|max:120|string',
        'tags' => 'bail|required|string|max:30',
        'body' => 'bail|required|min:300|max:100000|string',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'category'  => 'exists:categories,name|required|min:6|max:15'

   ]);
        $category = Category::where('name',request('category'))->first()->id;
        $imageName = time() . request()->image->getClientOriginalName() ;
        request()->image->move(public_path('images'), $imageName);
        $article = Article::create([
            'title' => \request('title'),
            'body' => \request('body'),
            'img' => $imageName,
            'user_id' =>auth()->user()->id,
            'category_id' => $category
        ]);
        $tags = explode(',',\request('tags'));
        foreach($tags as $tag){
            trim($tag);
            $taged = Tag::firstOrCreate(['name' => $tag]);
            $article->tags()->attach($taged);
        }
        return redirect()->home();


    }
    public function find($article)
    {
        $article = str_replace('-', ' ', $article);
        $article1 = $article . '?';
        $article = Article::where('title' , $article)->orwhere('title', $article1 )->firstOrFail() ;
        $visits = $article->visits   ;
        $article->update(['visits'=>$visits +1 ]);
        return view( 'read-more', compact('article'));
    }
    public function vote($article)
    {

        request()->validate(['points'=>'required|boolean']);
        if (request('points')) {
            $UpOrDOwn = +1;
        }elseif (!request('points')) {
            $UpOrDOwn = -1;
        }
        $article = str_replace('-', ' ', $article);
        $post = Article::where('title' , $article)->orwhere('title', $article.'?' )->get() ;
        foreach ($post as $point) {
            //check vote
            $vote = Vote::where('user_id', auth()->user()->id )
                        ->where( 'article_id', $point->id )
                        ->first();
            //user didn't vote
            if($vote == null){
                Vote::create([
                    'user_id'=> auth()->user()->id,
                    'article_id'=> $point->id,
                    'points'=> $UpOrDOwn
                ]);
                //if vote exist
                //check type
            }else{
                // if same ... delete
                if($vote->points == $UpOrDOwn){
                    Vote::where('user_id', auth()->user()->id )
                        ->where( 'article_id', $point->id )
                        ->delete();
                }
                // if not .. update type
                else{
                    Vote::where('user_id', auth()->user()->id )
                        ->where( 'article_id', $point->id )
                        ->update(['points'=> $UpOrDOwn]);
                }
            }
            $vote4 = Article::where('id',$point->id)->first();
            $points = DB::table('votes')->selectraw( 'SUM(points) as points')->where('article_id',$point->id)->pluck('points');
            $category =$vote4->category;
            $user = $vote4->user;
            foreach ($points as $votet){
              if ($votet == null){
                  $point->update(['points'=>0 ]);
                  $catpot = $category->articles->pluck('points')->sum() ;
                      $category->update(['points' => $catpot]);
                 $userpot = $user->articles->pluck('points')->sum() ;
                 $userpotarticles = $user->articles->count() * 5 ;
                      $user->update(['points' => $userpot + $userpotarticles]);
              }else {
                  $point->update(['points' => $votet]);
                 $catpot = $category->articles->pluck('points')->sum() ;
                      $category->update(['points' => $catpot]);
                  $userpot = $user->articles->pluck('points')->sum() ;
                  $userpotarticles = $user->articles->count() * 5 ;
                  $user->update(['points' => $userpot + $userpotarticles]);

              }
        }}

       return response(dd($points));
    }
    public function comment($article)
    {
        $this->validate(\request(),[
            'comment' => 'bail|required|min:2|max:600|string',
        ]);

   $article = str_replace('-', ' ', $article);
        $article1 = $article . '?';
        $post = Article::where('title' , $article)->orwhere('title', $article1 )->get() ;
        foreach ($post as $point) {
           $comment = Comment::create([
          'comment' =>  request('comment'),
          'article_id' => $point->id,
           'user_id' => auth()->user()->id,
        ]);
        }
        return response()->json($comment->id);
    }
    public function delete($article)
    {
        $article = str_replace('-', ' ', $article);
        $article1 = $article . '?';
        $art = Article::where('title' , $article)->orwhere('title', $article1 )->first();
        if ($art->user == auth()->user()){
            $art->delete();
        };
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('edit-article',compact('article'));
    }
    public function search()
    {
            $articles = Article::search(request('query'))->latest()->paginate(10);
                return view('home')->with('articles', $articles);
    }
    public function update($id)
    {
        $this->validate(\request(),[
            'title' => 'bail|required|min:2|max:120|string',
            'tags' => 'bail|required|string|max:120',
            'body' => 'bail|required|min:300|max:100000|string',
            'category'  => 'exists:categories,name|required|min:6|max:15'

        ]);
        $category = Category::where('name',request('category'))->first()->id;
        if (request()->image) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }

        if ($art = auth()->user()->articles->find($id)){
            $art->update([
                'title' => request('title'),
                'body' => request('body'),
                'image' => request('image'),
                'category_id' => $category,
            ]);
            $tags = explode(',',\request('tags'));
            foreach($tags as $tag){
                trim($tag);
                foreach ($art->tags as $tag1){
                    $art->tags()->detach($tag1);
                    $tag1->delete();
                };
                $taged = Tag::Create(['name' => $tag]);
                    $art->tags()->attach($taged);
            }

        }
        return redirect('home');
    }
    public function lastHour()
    {
        $articles = Article::where('is_approved',1)->whereDate('created_at', '>', \Carbon\Carbon::now()->subHour())->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function today()
    {
        $articles = Article::where('is_approved',1)->whereDate('created_at', '=', \Carbon\Carbon::today())->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function month()
    {
        $articles = Article::where('is_approved',1)->whereDate('created_at', '>', \Carbon\Carbon::now()->subMonth())->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function year()
    {
        $articles = Article::where('is_approved',1)->whereDate('created_at', '>', \Carbon\Carbon::now()->subYear())->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function top1()
    {
        $articles = Article::where('is_approved',1)->orderByRaw('visits desc')->take(1)->get();
        return view('home',compact('articles'));
    }
    public function top10()
    {
        $articles = Article::where('is_approved',1)->orderByRaw('visits desc')->take(10)->get();
        return view('home',compact('articles'));
    }
    public function top100()
    {
        $articles = Article::where('is_approved',1)->orderByRaw('visits desc')->take(100)->paginate(10);
        return view('home',compact('articles'));
    }
    public function top1000()
    {
        $articles = Article::where('is_approved',1)->orderByRaw('visits desc')->take(1000)->paginate(10);
        return view('home',compact('articles'));
    }
    public function science()
    {
        $articles = Article::where('is_approved',1)->where('category_id',1)->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function technology()
    {
        $articles = Article::where('is_approved',1)->where('category_id',2)->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function engineer()
    {
        $articles = Article::where('is_approved',1)->where('category_id',3)->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function mathematics()
    {
        $articles = Article::where('is_approved',1)->where('category_id',4)->latest()->paginate(10);
        return view('home',compact('articles'));
    }
    public function topuser()
    {
        $articles = \App\User::orderByRaw('points desc')->first()->articles()->where('is_approved','1')->latest()->paginate(10);
        return vxpiew('home',compact('articles'));
    }
   public function top10users()
    {
        $articles = \App\User::orderByRaw('points desc')->take(10)->get()->pluck('articles')->first()->first()->where('is_approved','1')->latest()->paginate(10);
        return view('home',compact('articles'));
    }
   public function top100users()
    {
        $articles = \App\User::orderByRaw('points desc')->take(100)->get()->pluck('articles')->first()->first()->where('is_approved','1')->latest()->paginate(10);
        return view('home',compact('articles'));
    }
   public function top1000users()
    {
        $articles = \App\User::orderByRaw('points desc')->take(1000)->get()->pluck('articles')->first()->first()->where('is_approved','1')->latest()->paginate(10);
        return view('home',compact('articles'));
    }

}