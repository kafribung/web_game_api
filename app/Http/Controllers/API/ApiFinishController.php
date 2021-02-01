<?php

namespace App\Http\Controllers\API;

use App\Models\Participant;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\FinishRequest;
use App\Http\Resources\API\FinishResource;

class ApiFinishController extends Controller
{
    // Show
    public function show(Participant $participant)
    {
        return FinishResource::make($participant);
    }

    // Update
    public function update(FinishRequest $request, Participant $participant)
    {
        $data = $request->validated();
        $participant->update($data);
        return FinishResource::make($participant);
    }
}
