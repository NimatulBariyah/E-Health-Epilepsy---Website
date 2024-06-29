<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController as Patient;

Route::middleware('auth')->group(function() {
    Route::get('/patient', [Patient::class, 'index'])->name('patient');
    Route::get('/patient/add', [Patient::class, 'store'])->name('add-patient');
    Route::get('/patient/edit/{id}', [Patient::class, 'store'])->name('edit-patient');
});