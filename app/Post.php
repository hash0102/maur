<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        'content',
        'review',
        'player_id',
        'user_id'
        ];
}
