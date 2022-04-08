<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
    
        public function likes()   
    {
        return $this->hasMany('App\Like');  
    }
    
    
     public function is_liked_by_auth_user()
    {
        $id = \Auth::user()->id;

        $likers = array();
        foreach($this->likes as $like) {
          array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  } 
}
