<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Position;

class PlayerController extends Controller
{
    //public function index(Player $player)
    //{
        //return view('player.index')->with(['posts' => $player->get()]);
    //}   
    
    public function PlayerTeam(Player $player) 
    {
        $PostTeam = App\Player::where('team_id', $player)->get();
        return $PostTeam;
    }
    
    public function index(Player $player, Team $team)
    {
        return view('players.index')->with(['players' => $player->get() , 'teams' => $team->get()]);
    }
    
    public function create(Team $team , Position $position) {
        return view('players/create')->with(['teams' => $team->get(), 'positions' => $position->get()]);
    }
    
    public function store(Request $request, Player $player)
    {
        $input = $request['player'];
        $player->fill($input)->save();
        return redirect('/players');
    }   
}


