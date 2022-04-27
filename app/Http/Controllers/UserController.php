<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Player;
use App\Team;
use App\Comment;

class UserController extends Controller
{
    public function index(Post $post, Team $team, Comment $Comment)
    {
        $post =  $post->getUserPaginateByLimit();
        return view('users/index')->with(['posts' => $post, 'teams' => $team->get()]);
    }
    
    public function create(Player $player, User $user, Team $team)
    {
        return view('users/create')->with(['players' => $player->get(), 'users' => $user->get(), 'teams' => $team->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/users');
    }
    
    public function show(Post $post)
    {
        return view('users/show')->with(['post' => $post]);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/users');
    }
    

}
