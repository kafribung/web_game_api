<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Position;

class ApiPositionController extends Controller
{
    public function __invoke()
    {
        $positions = Position::get();
        return response()->json(['data' => $positions], 200);
    }
}
