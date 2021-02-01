<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('position')->paginate(50);
        return view('backend.participant', compact('participants'));
    }

    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        // Delete image relation form storage
        foreach ($participant->images as $image) {
            Storage::delete($image->img);
        }
        $participant->delete();
    }
}
