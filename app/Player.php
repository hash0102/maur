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
        '3P',
        'FT ',
        'team_id',
        'position_id',
        'first_name',
        'middle_name',
        'last_name',
        'age'
    ];
}
