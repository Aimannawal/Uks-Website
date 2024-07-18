<?php

use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/obat/{id}', [ObatController::class, 'show'])->name('show');
Route::get('/Service', [ServiceController::class, 'index'])->name('Service');
Route::get('/', [LandingpageController::class, 'index'])->name('Landingpage');
Route::get('/dashboard', [ObatController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('showw');
Route::resource('obats', ObatController::class)->middleware(['auth', 'verified']);
Route::resource('riwayat', RiwayatController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
