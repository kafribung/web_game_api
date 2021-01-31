<?php

namespace App\Http\Controllers\Backend;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GameRequest;

class GameController extends Controller
{
    // Read
    public function index()
    {
        $games = Game::with('user')->orderBy('id', 'desc')->get();
        return view('backend.game', compact('games'));
    }

    // Create
    public function create()
    {
        return view('backend_create.game_create');
    }

    // Store
    public function store(GameRequest $request)
    {
        $data = $request->all();
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_games', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        $request->user()->games()->create($data);
        return redirect('/game')->with('msg', 'Data game berhasil ditambahkan!');
    }

}
