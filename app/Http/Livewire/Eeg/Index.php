<?php

namespace App\Http\Livewire\Eeg;

use Livewire\Component;
use App\Models\EegResult;

class Index extends Component
{
    public $eegs = [];
    public $errMessage = '';
    public $isDokter = false;
    private function getData()
    {
        $this->eegs = EegResult::all();
        foreach($this->eegs as $eeg) {
            // cek apakah data eeg ada filenya
            // if($eeg->attachments) {
            //     foreach($eeg->attachments as $file) {
            //         $file->path = null;

            //         // cek apakah file ada gambar
            //         $arrExt = explode('.', $file->file);
            //         $ext = end($arrExt);
            //         $extImages = ['jpg', 'jpeg', 'png', 'gif'];

            //         // jika file adalah gambar, maka get path foldernya
            //         if(in_array($ext, $extImages)) {
            //             // check apakah file tersebut ada
            //             $path = public_path('storage/eeg/' . $file->file);
            //             if(file_exists($path)) {
            //                 $file->path = url('storage/eeg/' . $file->file);
            //             }
            //         }

            //     }
            // }
        }
    }

    public function mount()
    {
        $this->isDokter = auth()->user()->role && auth()->user()->role->level && auth()->user()->role->level->key == 'dokter' || auth()->user()->role->level->key == 'pengolah';
        $this->getData();
    }

    public function render()
    {

        return view('livewire.eeg.index');
    }

    public function delete($id)
    {
        $eeg = EegResult::find($id);
        if(!$eeg) {
            $this->errorMessage = 'Data tidak ditemukan';
            return false;
        }

        if(count($eeg->attachments) > 0) {
            foreach($eeg->attachments as $file):
                $path = storage_path('app/public/eeg/' . $file->file);
                if(file_exists($path)) {
                    unlink($path);
                }
            endforeach;
        }
        
        $eeg->delete();
        return redirect()->route('eeg');
    }
}
