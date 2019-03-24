<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'user_id','subject','body'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
