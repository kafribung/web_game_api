<?php

namespace App\Http\Controllers\Backend;

use App\Models\{User, Game};
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $admin  = User::where('role', 1)->count();
        $game = Game::count();
        return view('backend.dashboard', compact('admin', 'game'));
    }
}
