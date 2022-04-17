<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }
    
    //いいね機能
    public function favorites() //PostとUserの中間テーブル
    {
        return $this->belongsToMany('App\Post');
    }
    
    public function is_favorite($postId) //いいねがあるか確認
    {
        return $this->favorites()->where('post_id',$postId)->exists();
    }

    public function favorite($postId) //いいねをつける機能
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($postId);
            return true;
        }
    }

    public function unfavorite($postId) //いいねを外す機能
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            $this->favorites()->detach($postId);
            return true;
        }else{
            return false;
        }
    }
    //ここまで
}


