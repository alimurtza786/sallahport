<?php

use App\Http\Controllers\Admin\AirportController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CommunityUpdateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\PrayerRoomController;
use App\Http\Controllers\Admin\TravelerTipController;
use App\Http\Controllers\Admin\WuduFacilityController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('airports', AirportController::class);
        Route::resource('prayer-rooms', PrayerRoomController::class);
        Route::resource('wudu-facilities', WuduFacilityController::class);
        Route::resource('traveler-tips', TravelerTipController::class);
        Route::resource('guides', GuideController::class);
        Route::resource('community-updates', CommunityUpdateController::class)->only(['index', 'edit', 'update', 'destroy']);
    });
});
