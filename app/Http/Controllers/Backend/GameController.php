<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Read
    public function index()
    {
        $games = Game::with('users')->orderBy('id', 'desc')->get();
        return view('backend.game', compact('games'));
    }

    // Create
    public function create()
    {
        return view('backend_create.game_create');
    }
    
    // Store
    public function store(TravelRequest $request)
    {
        $data = $request->all();
        if ($bg = $request->file('bg')) {
            $data['bg'] = $bg->storeAs('img_travels', time(). '.' . $bg->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        if (Travel::where('slug', $data['slug'])->first() != null) {
            $data['slug'] .= time();
        }
        $request->user()->travels()->create($data);
        return redirect('/travel')->with('msg', 'Data wisata berhasil ditambahkan!');
    }

}
