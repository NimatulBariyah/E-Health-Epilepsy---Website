<?php

namespace App\Http\Livewire\EegProcessed;
use App\Models\EegProcessed;
use Livewire\Component;

class Index extends Component
{
    public $eegs = [];
    public $isDokter = false;
    private function getData()
    {
        $this->eegs = EegProcessed::all();
    }

    public function mount()
    {
        $this->isDokter = auth()->user()->role && auth()->user()->role->level && auth()->user()->role->level->key == 'dokter';
        $this->getData();
    }

    public function render()
    {
        return view('livewire.eeg-processed.index');
    }

    public function delete($id)
    {
        $eeg = EegProcessed::find($id);
        if(!$eeg) {
            $this->errorMessage = 'Data tidak ditemukan';
            return false;
        }

        if(count($eeg->attachments) > 0) {
            foreach($eeg->attachments as $file):
                $path = storage_path('app/public/eeg-processed/' . $file->file);
                if(file_exists($path)) {
                    unlink($path);
                }
            endforeach;
        }
        
        $eeg->delete();
        return redirect()->route('eeg-processed');
    }
}
