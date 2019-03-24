<?php

namespace App;
use Sofa\Eloquence\Eloquence;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    use Eloquence;
    protected $searchableColumns = ['title', 'body'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    protected $fillable = [
        'title', 'body', 'img','tags','category_id','user_id','points','visits'
    ];
    public function getRouteKeyName()
    {
        return 'title';
    }

    public static function bestArticle()
    {

        return static::orderByRaw('points desc')->whereDate('created_at', '=' ,Carbon::today())->where('is_approved','1')->first();
    }

}
