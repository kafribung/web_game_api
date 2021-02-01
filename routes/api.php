<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{ApiPositionController, ApiRegisterController, ApiQrCodeController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Jabatan
Route::get('position', ApiPositionController::class);

// Peserta (Qr-Code)
Route::get('qrcode/{participant:id}', ApiQrCodeController::class);


// Registrasi Peserta
Route::patch('register/{participant:id}', [ApiRegisterController::class, 'update']);
