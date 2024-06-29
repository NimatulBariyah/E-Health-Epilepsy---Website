<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EegController as Eeg;

Route::middleware('auth')->group(function() {
    Route::get('/eeg', [Eeg::class, 'index'])->name('eeg');
    Route::get('/eeg/add', [Eeg::class, 'store'])->name('add-eeg');
    Route::get('/eeg/edit/{id}', [Eeg::class, 'store'])->name('edit-eeg');
    Route::get('/eeg/detail/{id}', [Eeg::class, 'detail'])->name('detail-eeg');
    Route::get('/eeg/download/{id}', [Eeg::class, 'download'])->name('download-eeg');
});