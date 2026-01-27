<?php

use App\Livewire\Auth\Login;
use App\Livewire\RaffleApplication;
use Illuminate\Support\Facades\Route;


Route::get('/', RaffleApplication::class)->name('home');
Route::get('/login', Login::class)->middleware('guest')->name('login');
