<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\User;
use App\Team;
use App\Position;
use App\Comment;
use Storage;

class CommentController extends Controller
{
    
    public function postIndex(Post $post , Comment $comment)
    {
        $post_id = $post->id;
        return view('posts/comment')->with(['post' => $post, 'comments' => $comment->where('post_id', $post_id)->get()]);
    }
    
    public function userIndex(Post $post , Comment $comment)
    {
        $post_id = $post->id;
        return view('users/comment')->with(['post' => $post, 'comments' => $comment->where('post_id', $post_id)->get()]);
    }
    
    public function postCreate(Post $post , Comment $comment)
    {
        return view('comments/create')->with(['post' => $post, 'comments' => $comment->get()]);
    }
    
    public function store(Request $request, Comment $comment, Post $post)
   {
       $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/');
   }
}
