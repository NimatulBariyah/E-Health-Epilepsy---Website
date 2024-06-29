<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Tambah Note Pasien</h3>
                </div>
            </div>  
        </div>
    </header>
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($message = Session::get('error'))
                    <strong class="text-danger">
                        {{ $message }}
                    </strong>
                    @endif
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label for="nama">ID Pasien</label>
                            <select wire:model="pasien_id" wire:change="getPatient" class="form-control" id="pasien_id">
                            <option value="{{ null }}">-- Pilih ID Pasien --</option>
                                @foreach($patients as $patient)
                                <option value="{{ $patient->pasien_id }}">
                                    {{ $patient->pasien_id }}
                                </option>
                                @endforeach
                            </select>
                            @error('pasien_id') <span class="text-danger error">{{ $message }}</span>@enderror
                            @if(!is_null($patient_info))
                            <table class="table w-full">
                                <tr>
                                    <th>JK</th>
                                    <td>{{ $patient_info->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <th>Sesi</th>
                                    <td>
                                        {{ $patient_info->sesi }}
                                    </td>
                                    <th>Tanggal & Waktu</th>
                                    <td>
                                        {{ $patient_info->start_date }} & {{ $patient_info->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usia</th>
                                    <td>{{ $patient_info->age }}</td>
                                    <th>Obat</th>
                                    <td>
                                        {{ $patient_info->drug }}
                                    </td>
                                    <th>Detak Jantung</th>
                                    <td>
                                        @if($patient_info->heart_rate)
                                        <span>{{ $patient_info->heart_rate }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Riwayat Penyakit</th>
                                    <td>
                                        @if($patient_info->disease_history)
                                        <span>{{ $patient_info->disease_history }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                    <th>Waktu Record</th>
                                    <td>
                                        @if($patient_info->record_time)
                                        <span>{{ $patient_info->record_time }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </table>
                            @endif
                            @if(count($eegs_info) > 0)
                            <!-- EEG -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <strong class="d-block">Data EEG</strong>
                                        <div>
                                            <a href="#" class="text-primary" data-toggle="collapse" data-target="#eeg-data">
                                                Show
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="collapse" id="eeg-data">
                                        @include('livewire.patient-note.components.table-eeg')
                                    </div>
                                </div>
                            </div>
                            <!-- / -->
                            @endif
                            @if(count($eegs_processed_info) > 0)
                            <!-- EEG -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <strong class="d-block">Data Hasil Pengolahan EEG</strong>
                                        <div>
                                            <a href="#" class="text-primary" data-toggle="collapse" data-target="#eeg-data">
                                                Show
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="collapse" id="eeg-data">
                                        @include('livewire.patient-note.components.table-eeg-processed')
                                    </div>
                                </div>
                            </div>
                            <!-- / -->
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama">Hasil Diagnosa</label>
                            <textarea wire:model="diagnostic_result" class="form-control" id="diagnostic_result" cols="30" rows="5"></textarea>
                            @error('diagnostic_result') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Langkah Selanjutnya</label>
                            <textarea wire:model="next_step" class="form-control" id="next_step" cols="30" rows="5"></textarea>
                            @error('next_step') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <br>
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('eeg') }}" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</section>