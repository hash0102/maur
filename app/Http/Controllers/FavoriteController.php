<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FavoriteController extends Controller
{
    public function store(Request $request, $Post_Id)
    {       
            \Auth::user()->favorites()->attach(Post::find($Post_Id));
            return back();
    }

    public function destroy($Post_Id)
    {
            \Auth::user()->unfavorite($Post_Id);
            return back();
    }
}
