<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Vote extends Model
{
    protected $fillable = [
        'user_id', 'article_id', 'points'
    ];
    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    protected $primaryKey = ['user_id', 'article_id'];
    public $incrementing = false;


}
