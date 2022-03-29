<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Team $team)
    {
      return view('team.index')->with(['posts' => $team->get()]);
    }
}
