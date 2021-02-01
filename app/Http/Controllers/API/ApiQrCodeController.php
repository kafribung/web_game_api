<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\QrCodeResource;
use App\Models\Participant;
use Illuminate\Http\Request;

class ApiQrCodeController extends Controller
{
    public function __invoke(Participant $participant)
    {
        return QrCodeResource::make($participant);
    }
}
