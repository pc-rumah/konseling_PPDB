<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user.status'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin', 'user.status'])->group(function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('/muser', UserController::class);

    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('muser.restore');
    Route::put('/users/{user}/deactivate', [UserController::class, 'deactivate'])
        ->name('muser.deactivate');
    Route::put('/users/{user}/reactivate', [UserController::class, 'reactivate'])
        ->name('muser.reactivate');
});

require __DIR__ . '/auth.php';
