<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EegProcessedController as EegProcessed;

Route::middleware('auth')->group(function() {
    Route::get('/eeg-processed', [EegProcessed::class, 'index'])->name('eeg-processed');
    Route::get('/eeg-processed/add', [EegProcessed::class, 'store'])->name('add-eeg-processed');
    Route::get('/eeg-processed/edit/{id}', [EegProcessed::class, 'store'])->name('edit-eeg-processed');
    Route::get('/eeg-processed/detail/{id}', [EegProcessed::class, 'detail'])->name('detail-eeg-processed');
    Route::get('/eeg-processed/download/{id}', [EegProcessed::class, 'download'])->name('download-eeg-processed');
});