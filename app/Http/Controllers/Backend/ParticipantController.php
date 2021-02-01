<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('position')->paginate(50);
        $participantFix = Participant::whereNotNull('name')->count();
        return view('backend.participant', compact('participants', 'participantFix'));
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
