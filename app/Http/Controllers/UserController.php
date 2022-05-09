<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Player;
use App\Team;
use App\Comment;
use InterventionImage;
use Storage;


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
    
    public function show(Post $post, Comment $comment)
    {
        $comment=Post::where('id', $post->id)->withCount('comments')->orderBy('id', 'desc')->paginate(5);
        return view('users/show')->with(['post' => $post , 'comments' => $comment]);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/users');
    }
    
    public function userPost(Post $post, $teamId, User $user, Team $team)
    {
        $user_id_auth = \Auth::user()->id;
        $player_infom_by_team = Post::with('player', 'team', 'user')->where([['team_id' , $teamId],['user_id', $user_id_auth]])->withCount('likes')->orderBy('id', 'desc')->paginate();
        return response()->json(['player_infom' => $player_infom_by_team]);
    }
    
    public function profile(User $user)
    {
        $user_id_auth = \Auth::user()->id;
        $auth_user_info=User::where('id',$user_id_auth)->first();
        return view('users/profile')->with(['user' => $auth_user_info, 'team']);
    }
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getEdit($id, Team $team)
    {
        $user = $this->user->selectUserFindById($id);
        return view('users.edit', compact('user'))->with(['teams' => $team->get()]);
    }
    
    public function postEdit($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $all_request = $request->all();
        
        if (isset($all_request['image'])) 
        {
            $profile_image = $request->file('image');
            $upload_info = Storage::disk('s3')->putFile('users-image', $profile_image, 'public');
            $all_request['image'] = Storage::disk('s3')->url($upload_info);
        }
            $user->fill($all_request)->save();
            return redirect('users/profile/mypage');
    }
}

