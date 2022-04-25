<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingLike extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ranking()
    {
        return $this->belongsTo('App\Ranking');
    }
}
