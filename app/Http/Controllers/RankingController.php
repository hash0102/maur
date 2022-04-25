<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\User;
use App\Team;
use App\Ranking;
use App\RankingLike;

class RankingController extends Controller
{
    public function index(Ranking $ranking)
    {
        //dd($pg_players_ranking);
        // $ranking = Ranking::find(1);
        // dd($ranking->players()->get());
        // $pg_ranking = Ranking::with('players')->where('position', 'PG')->get();
        // $sg_ranking = Ranking::with('players')->where('position', 'SG')->get();
        // $sf_ranking = Ranking::with('players')->where('position', 'SF')->get();
        // $pf_ranking = Ranking::with('players')->where('position', 'PF')->get();
        // $c_ranking = Ranking::with('players')->where('position', 'C')->get();
        $ranking = Ranking::withCount('rankinglikes')->orderBy('id', 'desc')->paginate(3);
        return view('ranking/index')->with(['rankings' => $ranking]);
    }
    
    public function create(Player $player, Team $team)
    {
        $pg_player = Player::where('position', 'PG');
        $sg_player = Player::where('position', 'SG');
        $sf_player = Player::where('position', 'SF');
        $pf_player = Player::where('position', 'PF');
        $c_player = Player::where('position', 'C');
        return view('ranking/create')->with(['pg_players' => $pg_player->get(),'sg_players' => $sg_player->get(), 
        'sf_players' => $sf_player->get() , 'pf_players' => $pf_player->get(), 'c_players' => $c_player->get(), 'teams' => $team->get()]);
    }
    
    public function store(Request $request, Ranking $ranking)
    {
        $input_ranking = $request['ranking'];
        $input_players = $request->players_array;
        $input_positions = $request->positions_array;
        $ranking->fill($input_ranking)->save();
        
        $ranking->players()->attach($input_players);
        return redirect('/ranking');
    }
    
    public function delete(Ranking $ranking)
    {
        $ranking->delete();
        return redirect('/ranking');
    }
    
    public function pgTeamSelectAjax(player $player, $pgTeamSelectId)
    {
        $pg_player_by_team = Player::where('position', 'PG')->where('team_id', $pgTeamSelectId)->get();
        return response()->json(['pg_player_select' => $pg_player_by_team]);
    }
    
    public function pgSelectAjax(Player $player, $pgSelectId)
    {
        $pg_player_by_id = Player::where('id',$pgSelectId)->get();
        return response()->json(['pg_player_select_by_id' => $pg_player_by_id]);
    }
    public function sgTeamSelectAjax(player $player, $sgTeamSelectId)
    {
        $sg_player_by_team = Player::where('position', 'SG')->where('team_id', $sgTeamSelectId)->get();
        return response()->json(['sg_player_select' => $sg_player_by_team]);
    }
    
    public function sgSelectAjax(Player $player, $sgSelectId)
    {
        $sg_player_by_id = Player::where('id',$sgSelectId)->get();
        return response()->json(['sg_player_select_by_id' => $sg_player_by_id]);
    }
    
    public function sfTeamSelectAjax(player $player, $sfTeamSelectId)
    {
        $sf_player_by_team = Player::where('position', 'SF')->where('team_id', $sfTeamSelectId)->get();
        return response()->json(['sf_player_select' => $sf_player_by_team]);
    }
    
    public function sfSelectAjax(Player $player, $sfSelectId)
    {
        $sf_player_by_id = Player::where('id',$sfSelectId)->get();
        return response()->json(['sf_player_select_by_id' => $sf_player_by_id]);
    }
    
    public function pfTeamSelectAjax(player $player, $pfTeamSelectId)
    {
        $pf_player_by_team = Player::where('position', 'PF')->where('team_id', $pfTeamSelectId)->get();
        return response()->json(['pf_player_select' => $pf_player_by_team]);
    }
    
    public function pfSelectAjax(Player $player, $pfSelectId)
    {
        $pf_player_by_id = Player::where('id',$pfSelectId)->get();
        return response()->json(['pf_player_select_by_id' => $pf_player_by_id]);
    }
    
    public function cTeamSelectAjax(player $player, $cTeamSelectId)
    {
        $c_player_by_team = Player::where('position', 'C')->where('team_id', $cTeamSelectId)->get();
        return response()->json(['c_player_select' => $c_player_by_team]);
    }
    
    public function cSelectAjax(Player $player, $cSelectId)
    {
        $c_player_by_id = Player::where('id',$cSelectId)->get();
        return response()->json(['c_player_select_by_id' => $c_player_by_id]);
    }
    
      public function like(Request $request)
    {
        $user_id = \Auth::user()->id;
        $ranking_id = $request->ranking_id;
        $already_liked = RankingLike::where('user_id', $user_id)->where('ranking_id', $ranking_id)->first();

        if (!$already_liked)
        {
            $rankinglike = new RankingLike;
            $rankinglike->ranking_id = $ranking_id;
            $rankinglike->user_id = $user_id;
            $rankinglike->save();
        } else {
            RankingLike::where('ranking_id', $ranking_id)->where('user_id', $user_id)->delete();
        }

        $ranking_likes_count = Ranking::withCount('rankinglikes')->findOrFail($ranking_id)->rankinglikes_count;
        $param = ['ranking_likes_count' => $ranking_likes_count];
        return response()->json($param);
    }
}
