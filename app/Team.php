<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id',
        'name',
        'abname',
        'state_name'
        ];

    public function players()   
    {
    return $this->hasMany('App\Player');
    }
}