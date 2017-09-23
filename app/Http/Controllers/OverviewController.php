<?php

namespace App\Http\Controllers;

use App\Repository;
use App\Team;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        $team = Team::find(auth()->user()->current_team);

        return view('home', compact('team'));
    }
}
