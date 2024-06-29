<?php

namespace App\Http\Livewire\PatientNote;

use Livewire\Component;
use App\Models\PatientNote;

class Index extends Component
{
    public $patient_notes = [];
    public $hasPermission = false;

    private function getData()
    {
        $this->patient_notes = PatientNote::all();
    }

    public function mount()
    {
        $this->getData();
    }

    public function render()
    {
        if(auth()->user()->role->level->key == 'dokter') {
            $this->hasPermission = true;
        }
        return view('livewire.patient-note.index');
    }

    public function delete($id)
    {
        $note = PatientNote::find($id);

        if(!$note) {
            return false;
        }

        $note->delete();
        return redirect()->route('patient-note');
    }
}
