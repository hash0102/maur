<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\User;
use Storage;
use App\Team;


class PostController extends Controller
{
    public function index(Post $post, Team $team)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(), 'teams' => $team->get()]);
    }
    
    //public function team(Team $team)
    //{
        //return view('posts/index')->with(['teams' => $team->get()]);
    //}
      
    public function show(Post $post)
        {
            return view('posts/show')->with(['post' => $post]);
        }
        
      public function create(Player $player, User $user)
        {
            return view('posts/create')->with(['players' => $player->get(), 'users' => $user->get()]);
        } 
        
    public function store(Request $request, Post $post)
        {
            $input = $request['post'];
            $post->fill($input)->save();
            return redirect('/');
        }   
        
        
    //public function playerTeam(Post $post)
        //{
            //$post_number = $post;
            
            //return response()->json(['post' => $post_number]);
       // }
        
    public function playerTeam()
      {
        $post_practice = Post::select('id','contents')->get();
        return $post_practice;
      }
    
}

