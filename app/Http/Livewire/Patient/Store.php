<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Patient;

class Store extends Component
{
    public $viewName = 'patient.store';
    public $updateMode = false;
    public $patient_id = NULL;
    // define props
    public $pasien_id = null;
    public $sesi = null;
    public $start_date = null;
    public $start_time = null;
    public $age = null;
    public $drug = null;
    public $disease_history = null;
    public $heart_rate = null;
    public $record_time = null;
    public $gender = null;

    private function resetForm() {
        $this->patient_id = NULL;
        $this->pasien_id = NULL;
        $this->sesi = NULL;
        $this->start_date = NULL;
        $this->start_time = NULL;
        $this->age = NULL;
        $this->drug = NULL;
        $this->disease_history = null;
        $this->heart_rate = null;
        $this->record_time = null;
        $this->gender = null;
    }

    public function store(Request $request)
    {
        $this->validate([
            'pasien_id' => 'required',
            'sesi' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'age' => 'required',
            'drug' => 'required'
        ]);

        // check if there pasien_id
        if(empty($this->patient_id)) {
            $isDuplicateId = Patient::where('pasien_id', $this->pasien_id)->first();
            if($isDuplicateId) {
                session()->flash('error', 'ID Pasien ' . $this->pasien_id . ' sudah ada!');
                return redirect()->route('add-patient');
            }
        }

        $patient = empty($this->patient_id) ? new Patient() : Patient::find($this->patient_id);
        $patient->pasien_id = $this->pasien_id;
        $patient->sesi = $this->sesi;
        $patient->start_date = $this->start_date;
        $patient->start_time = $this->start_time;
        $patient->age = $this->age;
        $patient->drug = $this->drug;
        if(!empty($this->disease_history)) {
            $patient->disease_history = $this->disease_history;
        }
        if(!empty($this->heart_rate)) {
            $patient->heart_rate = $this->heart_rate;
        }
        if(!empty($this->record_time)) {
            $patient->record_time = $this->record_time;
        }
        if($request->has('gender')) {
            $patient->gender = $request->input('gender');
        }
        $patient->save();

        return redirect()->route('patient');
    }

    public function render(Request $request, $id = null)
    {
        if($id = \Route::current()->parameter('id')) {
            $patient = Patient::find($id);
            $this->patient_id = $patient->id;
            $this->pasien_id = $patient->pasien_id;
            $this->sesi = $patient->sesi;
            $this->start_date = $patient->start_date;
            $this->start_time = $patient->start_time;
            $this->age = $patient->age;
            $this->drug = $patient->drug;
            $this->disease_history = $patient->disease_history;
            $this->heart_rate = $patient->heart_rate;
            $this->record_time = $patient->record_time;
            $this->gender = $patient->gender;
        }
        return view('livewire.patient.store');
    }
}
