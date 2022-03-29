<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PositionController extends Controller
{
    public function index(Position $position)
    {
        return view('position.index')->with(['posts' => $position->get()]);
    }
}
