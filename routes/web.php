<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('chirps.index');

Route::get('/chirps', function () {
    return 'Wellcome to our chrips';
});


Route::get('/chirps/{chirp}', function ($chirp) {
    if ($chirp === '2') {
        return redirect()->route('chirps.index');
    }
    return 'chirp detail '. $chirp;
});

/*
Route::get('/chirps/{chirp?}', function ($chirp = null) {
    return 'Wellcome to our chrips '. $chirp;
});
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
