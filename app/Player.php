<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    
    protected $fillable = [
        'id',
        'height',
        'weight',
        'PPG',
        'RPG',
        'APG',
        'MPG',
        'FG',
        'three_point',
        'FT',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'image',
        'team_id',
        'position_id'
    ];
        public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
        public function team()   
    {
        return $this->belongsTo('App\Team');  
    }
    
       public function position()   
    {
        return $this->belongsTo('App\Position');  
    }
}
