<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;


class ImageController extends Controller
{
    public function show(Participant $participant)
    {
        return view('backend.images', compact('participant'));
    }
}
