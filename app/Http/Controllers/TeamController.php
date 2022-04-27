<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{ 
    public function teamapi(Team $team)
    {
        $team_api = $team->teamapi();
    }
}

