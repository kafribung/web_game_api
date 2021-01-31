<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        QrCode::size(200)->generate($id, public_path('qr-codes/' . $id . '.svg'));
        return view('backend.qrcode', compact('id'));
    }

    public function print($id)
    {
        $file = public_path('qr-codes/'. $id .'.svg');
        return response()->download($file);
    }
}
