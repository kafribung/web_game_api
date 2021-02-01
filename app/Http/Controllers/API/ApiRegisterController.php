<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\ParticipantResource;
use App\Models\Travel;
use Illuminate\Http\Request;

class ApiRegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        dd($data);
    }
}
