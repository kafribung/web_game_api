<?php

namespace App\Http\Controllers\Backend;

use App\Models\Participant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index()
    {
        // $participants = Participant::with('position')->paginate(50);
        $participantFix = Participant::whereNotNull('name')->count();
        $participants = Participant::with('position')
        ->orderBy('stage1', 'desc')
        ->orderBy('stage2', 'desc')
        ->orderBy('stage3', 'desc')
        ->orderBy('stage4', 'desc')
        ->orderBy('stage5', 'desc')
        ->orderBy('stage6', 'desc')
        ->paginate(50);
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
