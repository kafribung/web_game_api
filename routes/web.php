<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\{AdminController, DashboardController, GameController, ParticipantController, PrivacyPolicyController,  QrcodeController};


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('admin')->group(function(){
    Route::get('dashboard', DashboardController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('game', GameController::class);
    // Participant
    Route::get('participant', [ParticipantController::class, 'index'])->name('participant.index');
    // QRCode
    Route::prefix('qr-code')->group(function(){
        Route::get('/{id}', [QrcodeController::class, 'index']);
        Route::post('/{id}/print', [QrcodeController::class, 'print']);
    });
});

// Privacy Policy
Route::get('privacy-policy', PrivacyPolicyController::class)->name('privacy.index');

Auth::routes(['register' => false]);