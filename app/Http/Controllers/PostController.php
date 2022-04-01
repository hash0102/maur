<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\User;
use App\Team;
use App\Position;
use Storage;

class PostController extends Controller
{
    public function index(Post $post, Team $team)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(), 'teams' => $team->get()]);
    }

    public function teamName(Post $post, $teamId , Team $team , Player $player)
    {
        $player_info_by_team = Post::with('player.position', 'team', 'user')->where('team_id' , $teamId)->get();
        return response()->json(['player_info' => $player_info_by_team]);
    }
      
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
        
    public function create(Player $player, User $user, Team $team)
    {
        return view('posts/create')->with(['players' => $player->get(), 'users' => $user->get(), 'teams' => $team->get()]);
    }
        
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/');
    }
}

