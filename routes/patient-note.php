<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientNoteController as PatientNote;

Route::middleware('auth')->group(function() {
    Route::get('/patient-note', [PatientNote::class, 'index'])->name('patient-note');
    Route::get('/patient-note/add', [PatientNote::class, 'store'])->name('add-patient-note');
    Route::get('/patient-note/edit/{id}', [PatientNote::class, 'store'])->name('edit-patient-note');
    Route::get('/patient-note/detail/{id}', [PatientNote::class, 'Detail'])->name('detail-patient-note');
});