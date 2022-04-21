<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'contents',
        'user_id',
        'post_id'
        ];
        
    public function getCommentPaginateByLimit($id)
    {
        return $this->withCount('commentlikes')->orderBy('updated_at', 'DESC')->where('post_id', $id)
        ->paginate(5);
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function commentlikes()
    {
        return $this->hasMany('App\CommentLike');
    }

    public function isCommentLikedBy($user): bool
    {
        return CommentLike::where('user_id', $user->id)->where('comment_id', $this->id)->first() !==null;
    }
}
