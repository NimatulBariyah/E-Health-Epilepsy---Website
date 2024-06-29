<?php

namespace App\Http\Livewire\EegProcessed;

use Livewire\Component;
use App\Models\EegProcessed as Eeg;
use App\Models\Patient;

class Detail extends Component
{
    public $eeg_processed = null;
    public $eeg_processed_id; // as param
    public $patient = null;
    public $images_ext = ['png', 'jpg', 'jpeg', 'gif'];

    private function getProcessedEeg()
    {
        $this->eeg_processed = Eeg::find($this->eeg_processed_id);
        if($this->eeg_processed) {
            $this->patient = Patient::where('pasien_id', trim($this->eeg_processed->pasien_id))->first();

            if($this->eeg_processed->attachments) {
                foreach($this->eeg_processed->attachments as $file):
                    $file->path = null; // init val

                    $arrFileName = explode('.', $file->file);
                    $ext = end($arrFileName);
                    $file->ext = $ext;

                    // check apakah file tersebut ada
                    $path = storage_path('app/public/eeg-processed/' . $file->file);

                    // if image
                    if(in_array($ext, $this->images_ext)) {
                        if(file_exists($path)) {
                            $file->path = url('storage/eeg-processed/' . $file->file);
                        }    
                    }
                    else if($ext == 'txt') {
                        if(file_exists($path)) {
                            $file->path = file_get_contents($path);
                        }
                    }
                    else {
                        if(file_exists($path)) {
                            $file->path = url('storage/eeg-processed/' . $file->file);
                        }
                    }
                endforeach;
            }
        }
    }

    public function mount()
    {
        $this->getProcessedEeg();
    }

    public function render()
    {
        return view('livewire.eeg-processed.detail');
    }
}
