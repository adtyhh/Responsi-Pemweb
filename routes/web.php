<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganController; 
use App\Http\Controllers\Admin\LowonganManagementController; 


Route::get('/', [LowonganController::class, 'index'])->name('home');
Route::get('/lowongans/{lowongan}', [LowonganController::class, 'show'])->name('lowongans.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/lowongan', LowonganManagementController::class)->names('admin.lowongan');
});

require __DIR__.'/auth.php';