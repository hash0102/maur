<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\User;
use App\Team;
use App\Position;
use App\Comment;
use App\Like;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'delete']);
        $this->middleware('can:update,article')->only(['edit', 'update']);
        $this->middleware('verified')->only('create');
    }

    public function index(Request $request, Post $post, Team $team, User $user)
    {
        $post = Post::withCount('likes')->orderBy('id', 'desc')->paginate(5);
        return view('posts/index')->with(['posts' => $post, 'teams' => $team->get()]);
    }

    public function UserIndex(Post $post , User $user , Team $team)
    {
        return view('users/index')->with(['posts' => $post->get(), 'teams' => $team->get()]);
    }

    public function userPost(Post $post, $teamId, User $user, Team $team)
    {
        $user_id_auth = \Auth::user()->id;
        $player_infom_by_team = Post::with('player', 'team', 'user')->where([['team_id' , $teamId],['user_id', $user_id_auth]])->withCount('likes')->orderBy('id', 'desc')->paginate();
        return response()->json(['player_infom' => $player_infom_by_team]);
    }
    
    public function latestPostAjax(Post $post, $teamId, User $user , Team $team)
    { 
        $player_info_by_team = Post::with('player', 'team', 'user')->where('team_id' , $teamId)->withCount('likes')->orderBy('id', 'desc')->paginate();
        return response()->json(['player_info' => $player_info_by_team]);
    }

    public function TeamSelectAjax($teamSelectId, Player $player)
    {
        $player_select_by_team = Player::where('team_id',$teamSelectId)->get();
        return response()->json(['player_select' => $player_select_by_team]);
    }
      
    public function show(Post $post, Comment $comment)
    {
        return view('posts/show')->with(['post' => $post , 'comments' => $comment->orderBy('created_at', 'asc')->limit(1)->get()]);
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
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function like(Request $request)
    {
        $user_id = \Auth::user()->id;
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if (!$already_liked) {
            $like = new Like;
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }

        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = ['post_likes_count' => $post_likes_count];
        return response()->json($param);
    }
}

