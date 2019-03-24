<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $user;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_log_at','points','about','school','avatar','country','last_login_ip','job'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeFilter($query , $filters)
    {
        if($name = isset($filters['name'])){
            $query->where('name',$filters['name']);
        }
        else{
            return 'not found';
        }
    }
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function topFive()
    {
        return static::orderByRaw('points desc')->take(5)->get();
    }
}
