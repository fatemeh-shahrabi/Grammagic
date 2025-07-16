<?php


use Illuminate\Support\Facades\Route;

use App\Livewire\Grammagic\Dashboard;
use App\Livewire\Grammagic\Level;


Route::view('/', 'welcome');


Route::middleware(['auth'])->group(function () {
    // Route for Dashboard
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Route for Level page
    Route::get('/level/{levelId}', Level::class)->name('level');
});


    // Route::view('dashboard', 'dashboard')
    // ->middleware(['auth', 'verified'])
    // ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
