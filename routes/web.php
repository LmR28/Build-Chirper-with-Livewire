<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Chirps\ChirpList;



Route::get('/', function () {
    return view('dashboard'); 
})->middleware(['auth'])->name('dashboard');


Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/chirps', ChirpList::class)
    ->middleware(['auth'])
    ->name('chirps.index');