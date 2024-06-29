<?php

namespace App\Http\Livewire\PatientNote;

use Livewire\Component;
use App\Models\PatientNote;
use App\Models\Patient;
use App\Models\EegResult;
use App\Models\EegProcessed;
use Illuminate\Support\Facades\Notification;

class Store extends Component
{
    public $patient_note_id = null;
    public $user_id = null;
    public $pasien_id = null;
    public $diagnostic_result = null;
    public $next_step = null;
    public $patients = [];
    public $patient_info = null;
    public $eegs_info = [];
    public $eegs_processed_info = [];

    public function mount()
    {
        $this->patients = Patient::all();
    }

    public function render()
    {
        if(auth()->user()->role->level->key != 'dokter') {
            return redirect()->route('patient-note');
        }
        if( $id = \Route::current()->parameter('id') ) {
            $note = PatientNote::find($id);
            $this->patient_note_id = $id;
            $this->pasien_id = $note->pasien_id;
            $this->diagnostic_result = $note->diagnostic_result;
            $this->next_step = $note->next_step;
            $this->getPatient();
        }
        return view('livewire.patient-note.store');
    }

    public function getPatient()
    {
        if($this->pasien_id) {
            // 
            $patient = Patient::where('pasien_id', $this->pasien_id)->first();
            if($patient) {
                $this->patient_info = $patient;
            }

            // get eeg
            $eegs = EegResult::where('pasien_id', $this->pasien_id)->get();
            if($eegs) {
                $this->eegs_info = $eegs;
            }

            // get eeg processed
            $eegs_processed = EegProcessed::where('pasien_id', $this->pasien_id)->get();
            if($eegs_processed) {
                $this->eegs_processed_info = $eegs_processed;
            }
        }
    }

    public function store()
    {
        $this->validate([
            'pasien_id' => 'required',
            'diagnostic_result' => 'required',
            'next_step' => 'required'
        ]);

        $note = empty($this->patient_note_id) ? new PatientNote() : PatientNote::find($this->patient_note_id);
        $note->user_id = auth()->user()->id;
        $note->pasien_id = $this->pasien_id;
        $note->diagnostic_result = $this->diagnostic_result;
        $note->next_step = $this->next_step;
        $note->save();

        if(empty($this->patient_note_id)) {
            $payload = (object)[
                'id' => $note->id,
                'pasien_id' => $this->pasien_id,
                'url' => '/patient-note/detail/' . $note->id
            ];

            // get user with role pengolah
            $processors = $this->getUserProcessors();
            if(count($processors) > 0) {
                Notification::sendNow($processors, new \App\Notifications\NotePasienCreated($payload));
            }
        }

        return redirect()->route('patient-note');
    }

    private function getUserProcessors()
    {
        define('PENGOLAH_KEY', 'pengolah');
        define('PETUGAS_KEY', 'petugas');
        $processorLevel = \App\Models\Level::whereIn('key', [PETUGAS_KEY, PENGOLAH_KEY])->get()->toArray();

        if(!$processorLevel) {
            return [];
        }

        $levels_id = array_map(function($level){
            return $level['id'];
        }, $processorLevel);

        $roles = \App\Models\Role::whereIn('level_id', $levels_id)->get()->toArray();
        $users_id = array_map(function($role) {
            return $role['user_id'];
        }, $roles);

        $users = \App\Models\User::whereIn('id', $users_id)->get();
        return $users;
    }
}
