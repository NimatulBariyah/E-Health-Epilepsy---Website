<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User;

Route::middleware('auth')->group(function() {
    Route::view('/user', 'livewire.user.main')->name('user');
    Route::get('/user/create', [User::class, 'create'])->name('add-user');
    Route::post('/user/store', [User::class, 'store'])->name('store-user');
});