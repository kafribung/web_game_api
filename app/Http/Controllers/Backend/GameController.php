<?php

namespace App\Http\Controllers\Backend;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(Game $game)
    {
        $this->authorize('isOwner', $game);
        return view('backend_edit.game_edit', compact('game'));
    }

    // / Update
    public function update(GameRequest $request, Game $game)
    {
        $this->authorize('isOwner', $game);
        $data = $request->all();
        if ($img = $request->file('img')) {
            $game->img == 'img_games/default_game.jpg' ? null : Storage::delete($game->img);
            $data['img'] = $img->storeAs('img_games', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        $game->update($data);
        return redirect('/game')->with('msg', 'Data game berhasil diedit!');
    }

    // Destroy
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $this->authorize('isOwner', $game);
        $game->img == 'img_games/default_game.jpg' ? null : Storage::delete($game->img);
        $game->delete();
    }

}
