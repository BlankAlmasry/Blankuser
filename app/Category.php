<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    //
    protected $fillable = [
      'points'
    ];
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
