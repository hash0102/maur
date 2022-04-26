<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;
use App\User;
use App\Team;
use App\Position;
use App\Comment;
use App\CommentLike;
use Storage;

class CommentController extends Controller
{
    
    public function postIndex(Request $request, Post $post , Comment $comment)
    {
        $comment = $comment->getCommentPaginateByLimit($post->id);
        return view('posts/comment')->with(['post' => $post, 'comments' => $comment]);
    }
    
    public function userIndex(Post $post , Comment $comment)
    {
       $comment = $comment->getCommentPaginateByLimit($post->id);
        return view('users/comment')->with(['post' => $post, 'comments' => $comment]);
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
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }

    public function like(Request $request)
    {
        $user_id = \Auth::user()->id;
        $comment_id = $request->comment_id;
        $already_liked = CommentLike::where('user_id', $user_id)->where('comment_id', $comment_id)->first();

        if (!$already_liked)
        {
            $commentlike = new CommentLike;
            $commentlike->comment_id = $comment_id;
            $commentlike->user_id = $user_id;
            $commentlike->save();
        } else {
            CommentLike::where('comment_id', $comment_id)->where('user_id', $user_id)->delete();
        }

        $comment_likes_count = Comment::withCount('commentlikes')->findOrFail($comment_id)->commentlikes_count;
        $param = ['comment_likes_count' => $comment_likes_count];
        return response()->json($param);
    }
}
