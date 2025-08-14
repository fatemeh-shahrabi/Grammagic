<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Grammagic\Dashboard;
use App\Livewire\Grammagic\Level;

// Public route for the welcome page
Route::view('/', 'welcome');

// Routes that require user authentication
Route::middleware(['auth'])->group(function () {
    // Route for the Dashboard page, handled by the Livewire Dashboard component
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Route for a specific Level page, handled by the Livewire Level component
    // The {levelId} parameter determines which level to display
    Route::get('/level/{levelId}', Level::class)->name('level');
});

// Route for the user profile page
// Only accessible by authenticated users
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Include additional authentication routes (login, register, etc.)
require __DIR__ . '/auth.php';
