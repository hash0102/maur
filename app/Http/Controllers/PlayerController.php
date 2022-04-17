<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Position;

class PlayerController extends Controller
{
    
    public function PlayerInfo($teamId , Team $team , Player $player)
    {
        $players_info = Player::with('team')->where('team_id' , $teamId)->paginate();
        return response()->json(['players_info' => $players_info]);
    }
    
    public function index(Player $player, Team $team)
    {
        return view('players.index')->with(['players' => $player->getPlayerPaginateByLimit() , 'teams' => $team->get()]);
    }
    
    public function create(Team $team , Position $position) {
        // if(\Auth::user()->id == 1){
        return view('players/create')->with(['teams' => $team->get(), 'positions' => $position->get()]);
        // }
    }
    
    public function store(Request $request, Player $player)
    {
        $input = $request['player'];
        $player->fill($input)->save();
        return redirect('/players');
    }   
    
    public function basketapi(Player $player){
        
        $player_api = $player->basketapi();
    }

}