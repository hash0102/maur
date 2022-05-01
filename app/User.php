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
       'name', 'email', 'password','team_id','image',
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
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function commentlikes()
    {
        return $this->hasMany('App\CommentLike');
    }
    
    public function rankinglikes()
    {
        return $this->hasMany('App\RankingLike');
    }
    
    public function team()
    {
        return $this->belongsTo('App\Team');  
    }
    
    public function selectUserFindById($id)
    {
        // 「SELECT id, name, email WHERE id = ?」を発行する
        $query = $this->select([
            'id',
            'name',
            'email',
            'team_id',
            'image',
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }
    
    public function updateUserFindById($user)
    {
        return $this->where([
            'id' => $user['id']
        ])->update([
            'name' => $user['name'],
            'email' => $user['email'],
            'team_id' => $user['team_id'],
        ]);
    }
    
        public function updateUserImage($user)
    {
        return $this->where([
            'id' => $user['id']
        ])->update([
            'image' => $user['image']
        ]);
    }
    
    
}


