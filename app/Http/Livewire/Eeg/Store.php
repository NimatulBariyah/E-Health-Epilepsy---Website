<?php

namespace App\Http\Livewire\Eeg;

use Livewire\Component;
use App\Models\EegResult as Eeg;
use App\Models\EegResultAttachment as EegAttachment;
use App\Models\Patient;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Notification;

class Store extends Component
{
    use WithFileUploads;

    public $eeg_id = null;
    public $pasien_id = null;
    public $sesi_id = null;
    public $code = null;
    public $user_id = null;
    public $description = null;
    public $attachments = [];
    public $av_attachments = [];
    public $patients = [];
    public $sesi = [];
    public $patient_info = null;

    public function mount()
    {
        $this->patients = Patient::all();
        $this->sesi = Sesi::all();
    }

    public function render()
    {
        if($eeg_id = \Route::current()->parameter('id')) {
            $this->eeg_id = $eeg_id;
            $eeg = Eeg::find($eeg_id);
            $this->pasien_id = $eeg->pasien_id;
            $this->user_id = $eeg->user_id;
            $this->sesi_id = $eeg->sesi_id;
            $this->description = $eeg->description;
            if($eeg->attachments) {
                $this->av_attachments = $eeg->attachments;
            }

            $this->getPatient();
        }
        return view('livewire.eeg.store');
    }

    public function store(Request $request)
    {
        if(empty($this->eeg_id)) {
            $this->validate([
                'pasien_id' => 'required',
                'sesi' => 'required',
                'attachments.*' => 'required'
            ]);
        }
        else {
            $this->validate([
                'pasien_id' => 'required'
            ]);
        }

        \DB::transaction(function() use ($request) {
            $check = Eeg::where('pasien_id', $this->pasien_id)
                        ->where('sesi_id', $this->sesi_id)->first();
            $eeg = $check ? $check : new Eeg();
            $eeg->pasien_id = $this->pasien_id;
            $eeg->user_id = auth()->user()->id;
            $eeg->sesi_id = $this->sesi_id;
            if( !is_null($this->description) ) {
                $eeg->description = $this->description;
            }
            $eeg->save();

            // Store attachment
            foreach($this->attachments as $file):
                $fileName = $file->getClientOriginalName();
                $attachment = new EegAttachment();
                $attachment->eeg_id = $eeg->id;
                $attachment->file = $fileName;
                $attachment->caption = '-';
                $attachment->save();

                // first upload
                $file->storeAs('public/eeg', $fileName);
            endforeach;
            if(empty($this->eeg_id)) {
                $payload = (object)[
                    'id' => $eeg->id,
                    'pasien_id' => $this->pasien_id,
                    'url' => '/eeg/detail/' . $eeg->id
                ];
    
                // get user with role pengolah
                $processors = $this->getUserProcessors();
    
                if(count($processors) > 0) {
                    Notification::sendNow($processors, new \App\Notifications\EEGCreated($payload));
                }
            }
        });


        return redirect()->route('eeg');
    }

    private function getUserProcessors()
    {
        define('PENGOLAH_KEY', 'pengolah');
        define('DOKTER_KEY', 'dokter');
        $processorLevel = \App\Models\Level::whereIn('key', [PENGOLAH_KEY, DOKTER_KEY])->get()->toArray();

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

    public function removeAttachment($file)
    {
        // delete file first
        $path = storage_path('app/public/eeg/' . $file['file']);
        if(file_exists($path)) {
            unlink($path);
        }
        $eeg_id = $file['eeg_id'];
        $file = EegAttachment::find($file['id']);
        $file->delete();
        $eeg = Eeg::find($eeg_id);
        $this->av_attachments = $eeg->attachments;
    }

    public function getPatient()
    {
        if($this->pasien_id) {
            // 
            $patient = Patient::where('pasien_id', $this->pasien_id)->first();
            if($patient) {
                $this->patient_info = $patient;
            }
        }
    }
}
