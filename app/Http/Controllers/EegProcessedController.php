<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EegProcessed;
use ZipArchive;

class EegProcessedController extends Controller
{
    public function index(Request $request)
    {
        $component = 'eeg-processed.index';
        return view('livewire.eeg-processed.main', compact('component'));
    }

    public function detail($id)
    {
        $component = 'eeg-processed.detail';
        return view('livewire.eeg-processed.main', compact('component', 'id'));
    }

    public function store(Request $request)
    {
        $component = 'eeg-processed.store';
        return view('livewire.eeg-processed.main', compact('component'));
    }

    public function download($eeg_id)
    {
        $eeg = EegProcessed::find($eeg_id);
        if(!$eeg) {
            return "<h2>Data tidak ditemukan";
        }

        if(count($eeg->attachments) < 1) {
            return redirect()->route('eeg');
        }

        $zip = new ZipArchive();
        $zipFileName = $eeg->pasien_id .'.zip';
        $create = $zip->open( public_path($zipFileName), ZipArchive::CREATE );

        if($create === TRUE) {
            foreach($eeg->attachments as $file):

                $fileName = storage_path('app/public/eeg-processed/' . $file->file);
                if(file_exists($fileName)) {
                    $zip->addFile($fileName, basename($fileName));
                }
            endforeach;
            $zip->close();
        }
        else {
            return "<h2>File EEG tidak ada</h2>";
        }

        $filetopath = public_path($zipFileName);

        if(!file_exists($filetopath)) {
            return "<h2>File EEG tidak ada</h2>";
        }

        // Set header
        $headers = [
            'Content-Type' => 'application/octet-stream'
        ];

        return response()->download($filetopath, $zipFileName, $headers)->deleteFileAfterSend();
    }
}