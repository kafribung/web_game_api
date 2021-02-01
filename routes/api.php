<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{ApiFinishController, ApiImageController, ApiPositionController, ApiRegisterController};

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


// Registrasi Peserta
Route::prefix('register')->group(function(){
    Route::get('/{participant:id}',[ApiRegisterController::class, 'show']);
    Route::patch('/{participant:id}', [ApiRegisterController::class, 'update']);
});

// Finish
Route::prefix('finish')->group(function(){
    Route::get('/{participant:id}',[ApiFinishController::class, 'show']);
    Route::patch('/{participant:id}', [ApiFinishController::class, 'update']);
});

// Image
Route::post('image/{participant:id}', ApiImageController::class);
