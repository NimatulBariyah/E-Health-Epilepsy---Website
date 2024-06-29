<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $component = 'patient.index';
        return view('livewire.patient.main', compact('component'));
    }

    public function store(Request $request)
    {
        $component = 'patient.store';
        return view('livewire.patient.main', compact('component'));
    }
}
