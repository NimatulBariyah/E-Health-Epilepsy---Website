<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{
    public $viewName = 'patient.index';
    public $patients = [];

    public function getData()
    {
        $this->patients = Patient::all();
    }

    public function delete($id) {
        // do confirm
        $patient = Patient::find($id);
        if($patient) {
            $patient->delete();
        }

        $this->getData();
    }

    public function render()
    {
        $this->getData();
        return view('livewire.patient.index');
    }
}
