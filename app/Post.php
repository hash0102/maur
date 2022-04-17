<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    
    protected $fillable = [
        'id',
        'content',
        'offense_review',
        'defense_review',
        'player_id',
        'user_id',
        'team_id'
        ];
        
    public function getPaginateByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    
    public function getAdminPaginateByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->where('user_id', 1)
        ->paginate($limit_count);
    }
    
    public function getUserPaginateByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->where('user_id', \Auth::user()->id )
        ->paginate($limit_count);
    }
    
    
    public function player()
    {
        return $this->belongsTo('App\Player'); 
    }
    
    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    public function comments()   
    {
        return $this->hasMany('App\Comment');  
    }

    public function favorite_users() //PostとUserの中間テーブル
    {
        return $this->belongsToMany('App\User');

    }

}
