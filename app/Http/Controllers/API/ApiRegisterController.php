<?php

namespace App\Http\Controllers\API;

use App\Models\Participant;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\API\RegisterResource;

class ApiRegisterController extends Controller
{
    // Show
    public function show(Participant $participant)
    {
        return RegisterResource::make($participant);
    }

    // Update
    public function update(RegisterRequest $request, Participant $participant)
    {
        $data = $request->validated();
        $participant->update($data);
        return RegisterResource::make($participant);
    }
}
