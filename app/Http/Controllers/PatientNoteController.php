<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientNoteController extends Controller
{
    public function index()
    {
        $component = 'patient-note.index';
        return view('livewire.patient-note.main', compact('component'));
    }

    public function store()
    {
        $component = 'patient-note.store';
        return view('livewire.patient-note.main', compact('component'));
    }

    public function detail($id)
    {
        $component = 'patient-note.detail';
        return view('livewire.patient-note.main', compact('component', 'id'));
    }
}
