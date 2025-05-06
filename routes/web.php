<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\AllergeneController;
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/reserver', [ReserverController::class, 'reserver'])->name('reserver');
Route::post('/reserver', [ReserverController::class, 'createReservation'])->name('reserver.store');
Route::get('/menu', [CarteController::class, 'menu'])->name('menu');
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/allergenes', [AllergeneController::class, 'index'])->name('allergenes');
Route::post('/reserver/create', [ReserverController::class, 'createReservation'])->name('reserver.create');
Route::get('/api/available-tables', [ReserverController::class, 'getAvailableTables']);

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');

Route::get('/cgu', function () {
    return view('cgu');
})->name('cgu');
