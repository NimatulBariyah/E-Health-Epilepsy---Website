<?php

namespace App\Http\Livewire\Eeg;

use Livewire\Component;
use App\Models\EegResult as Eeg;
use App\Models\EegResultAttachment as EegAttachment;
use App\Models\Patient;

class Detail extends Component
{
    public $eeg = null;
    public $eeg_id; // as param
    public $patient = null;
    public $images_ext = ['png', 'jpg', 'jpeg', 'gif'];

    private function getEeg()
    {
        $this->eeg = Eeg::find($this->eeg_id);
        if($this->eeg) {
            $this->patient = Patient::where('pasien_id', trim($this->eeg->pasien_id))->first();

            if($this->eeg->attachments) {
                foreach($this->eeg->attachments as $file):
                    $file->path = null; // init val

                    $arrFileName = explode('.', $file->file);
                    $ext = end($arrFileName);
                    $file->ext = $ext;

                    // check apakah file tersebut ada
                    $path = storage_path('app/public/eeg/' . $file->file);

                    // if image
                    if(in_array($ext, $this->images_ext)) {
                        if(file_exists($path)) {
                            $file->path = url('storage/eeg/' . $file->file);
                        }    
                    }
                    else if($ext == 'txt') {
                        if(file_exists($path)) {
                            $file->path = file_get_contents($path);
                        }
                    }
                    else {
                        if(file_exists($path)) {
                            $file->path = url('storage/eeg/' . $file->file);
                        }
                    }
                endforeach;
            }
        }
    }

    public function mount()
    {
        $this->getEeg();
    }

    public function render()
    {
        return view('livewire.eeg.detail');
    }
}
