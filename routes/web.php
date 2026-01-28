<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RaffleApplication;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Page\Admin\Raffle;

Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::middleware('auth')->group(function() {
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/admin/raffle', Raffle::class)
        ->middleware('can:admin')
        ->name('admin.raffle');
});

Route::get('/', RaffleApplication::class)->name('home');