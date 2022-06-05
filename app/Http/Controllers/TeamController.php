<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\TeamStat;
use App\Player;

class TeamController extends Controller
{ 
    public function teamapi(Team $team)
    {
        $team_api = $team->teamapi();
    }
    
    public function index(Team $team, TeamStat $teamstat)
    {
        return view('teams/index')->with(['teams' => $team->orderBy('state_name','asc')->paginate(5), 'teamStats' => $teamstat->get()]);
    }
    
    public function playersByTeam(Team $team, Player $player, $id)
    {
        $playersByTeam = Player::where('team_id', $id)->paginate(5);
        $team= Team::where('id', $id)->get();
        return view('teams/playersByTeam')->with(['players' => $playersByTeam, 'teams' => $team]);
    }
    
    public function AjaxConference(Team $team, TeamStat $teamstat ,$teamConf)
    {
        $team_select_by_conf=Team::with('teamstat')->where('conference', $teamConf)->orderBy('state_name','asc')->get();
        return response()->json(['team_conf' => $team_select_by_conf]);
    }
}

