<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('users')->orderBy('id', 'desc')->get();
        return view('backend.game', compact('games'));
    }
}
