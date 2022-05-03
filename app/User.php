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
        $query = $this->select([
            'id',
            'name',
            'email',
            'team_id',
            'image',
        ])->where([
            'id' => $id
        ]);
        return $query->first();
    }
}


