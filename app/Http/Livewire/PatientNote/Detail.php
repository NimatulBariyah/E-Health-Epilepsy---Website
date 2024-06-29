<?php

namespace App\Http\Livewire\PatientNote;

use Livewire\Component;
use App\Models\PatientNote;
use App\Models\Patient;

class Detail extends Component
{
    public $patient_note_id = null;
    public $patient_note = null;
    public $patient = null;

    private function getPatientNote()
    {
        $patient_note = PatientNote::find($this->patient_note_id);
        if($patient_note) {
            $this->patient_note = $patient_note;
            $this->patient = Patient::where('pasien_id', $patient_note->pasien_id)->first();
        }
    }

    public function mount()
    {
        $this->getPatientNote();
    }

    public function render()
    {
        return view('livewire.patient-note.detail');
    }
}
