<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Upload Hasil Pengolahan EEG</h3>
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
                            <select class="form-control" wire:model="pasien_id" wire:change="getPatient" id="pasien_id">
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
                        </div>
                        <div class="form-group">
                            <label for="nama">Sesi</label>
                            <select class="form-control" wire:model="sesi_id" wire:change="getPatient" id="sesi_id">
                                <option value="{{ null }}">-- Pilih Sesi --</option>
                                @foreach($sesi as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->value }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Dokumen Hasil Pengolahan EEG</label>
                            <input wire:model="attachments" type="file" multiple class="form-control" id="attachments" placeholder="Ex: 003">
                            @error('attachments') <span class="text-danger error">{{ $message }}</span>@enderror

                            @if( count($av_attachments) > 0)
                            @foreach($av_attachments as $file)
                            <section class="d-flex justify-content-between">
                                <strong>{{ $file->file }}</strong>
                                <a href="#" wire:click.prevent="removeAttachment({{$file}})" class="d-block text-danger">Hapus</a>
                            </section>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama">Deskripsi</label>
                            <textarea wire:model="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                            @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
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