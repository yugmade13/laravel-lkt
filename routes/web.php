<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/interviews', [\App\Http\Controllers\InterviewController::class, 'index'])->name('interview');
    Route::get('/interviews/create', [\App\Http\Controllers\InterviewController::class, 'create'])->name('interview.create');
    Route::post('/interviews', [\App\Http\Controllers\InterviewController::class, 'store'])->name('interview.store');
    Route::get('/interviews/{interview}/edit', [\App\Http\Controllers\InterviewController::class, 'edit'])->name('interview.edit');
    Route::put('/interviews/{interview}', [\App\Http\Controllers\InterviewController::class, 'update'])->name('interview.update');
    Route::delete('/interviews/{interview}', [\App\Http\Controllers\InterviewController::class, 'destroy'])->name('interview.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
