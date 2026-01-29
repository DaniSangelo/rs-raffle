<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Page\Home;
use App\Livewire\Page\Admin\Raffle;
use App\Livewire\Page\Raffle as PageRaffle;

Route::get('/login', Login::class)->middleware('guest')->name('login');
Route::middleware('auth')->group(function() {
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/admin/raffle', Raffle::class)
        ->middleware('can:admin')
        ->name('admin.raffle');
});

Route::get('/', Home::class)->name('home');
Route::get('/{raffle}', PageRaffle::class)->name('raffle');