<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
// Untuk Export Blade
use Maatwebsite\Excel\Concerns\FromView;
// Untuk Export Collecction langsung dari DB
use Maatwebsite\Excel\Concerns\FromCollection;

class ParticipantExport implements FromView
{
    
    public function view(): View
    {
        $participants = DB::table('participants')
        ->select('id', 'name', 'hp', 'stage1', 'time1', 'stage2', 'time2', 'stage3', 'time3', 'stage4', 'time4', 'stage5', 'time5', 'stage6', 'time6','position_id', 
        DB::raw('SUM(stage1 + stage2 + stage3 + stage4 + stage5 + stage6) as total'))
        ->groupBy('id', 'name', 'hp', 'stage1', 'time1', 'stage2', 'time2', 'stage3', 'time3', 'stage4', 'time4', 'stage5', 'time5', 'stage6', 'time6','position_id')
        ->orderBy('total', 'desc')
        ->get();
        return view('backend_export.participant_export', compact('participants'));
    }
}
