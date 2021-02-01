<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\GameResource;
use App\Models\Game;

class ApiGameController extends Controller
{
    public function index()
    {
        $games = Game::get();
        return GameResource::collection($games);
    }

    public function show(Game $game)
    {
        return GameResource::make($game);
    }
}
