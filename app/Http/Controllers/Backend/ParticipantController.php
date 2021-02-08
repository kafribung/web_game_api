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
        $participantFix = Participant::whereNotNull('name')->count();
        $participants = DB::table('participants')
        ->select('id', 'name', 'hp', 'stage1', 'time1', 'stage2', 'time2', 'stage3', 'time3', 'stage4', 'time4', 'stage5', 'time5', 'stage6', 'time6','position_id', 
        DB::raw('SUM(stage1 + stage2 + stage3 + stage4 + stage5 + stage6) as total'))
        ->groupBy('id', 'name', 'hp', 'stage1', 'time1', 'stage2', 'time2', 'stage3', 'time3', 'stage4', 'time4', 'stage5', 'time5', 'stage6', 'time6','position_id')
        ->orderBy('total', 'desc')
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
