<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'contents',
        'player_id',
        'user_id',
        ];
    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
    
    public function players()
    {
        return $this->belongsToMany('App\Player');
    }
    
    public function Rankinglikes()
    {
        return $this->hasMany('App\RankingLike');
    }
    
    public function isRankingLikedBy($user): bool
    {
        return RankingLike::where('user_id', $user->id)->where('ranking_id', $this->id)->first() !==null;
    }
}
