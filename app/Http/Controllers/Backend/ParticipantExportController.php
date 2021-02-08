<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ParticipantExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class ParticipantExportController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new ParticipantExport, 'PesertaPertaminaEvent.xlsx');
    }
}
