
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
                    <h3>Detail Pengolahan EEG</h3>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ url('/eeg-processed') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>  
        </div>
    </header>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4"><strong>Info Pasien <span class="text-danger">[{{$patient->pasien_id}}]</span></strong></h4>
                            @if(!$patient)
                            <section class="alert alert-danger">Data Pasien dengan kode <strong>{{ $eeg->pasien_id }}</strong> tidak ditemukan</section>
                            @else
                            <table class="table w-full mb-4">
                                <tr>
                                    <th>JK</th>
                                    <td>{{ $patient->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <th>Sesi</th>
                                    <td>
                                        {{ $patient->sesi }}
                                    </td>
                                    <th>Tanggal & Waktu</th>
                                    <td>
                                        {{ $patient->start_date }} & {{ $patient->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usia</th>
                                    <td>{{ $patient->age }}</td>
                                    <th>Obat</th>
                                    <td>
                                        {{ $patient->drug }}
                                    </td>
                                    <th>Detak Jantung</th>
                                    <td>
                                        @if($patient->heart_rate)
                                        <span>{{ $patient->heart_rate }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Riwayat Penyakit</th>
                                    <td>
                                        @if($patient->disease_history)
                                        <span>{{ $patient->disease_history }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                    <th>Waktu Record</th>
                                    <td>
                                        @if($patient->record_time)
                                        <span>{{ $patient->record_time }}</span>
                                        @else
                                        <i class="text-danger">Belum ada.</i>
                                        @endif
                                    </td>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </table>
                            @endif
                            <h5 class="mb-2"><strong>Deskripsi Pengolahan EEG</strong></h5>
                            <p>{{ $eeg_processed->description }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4"><strong>Lampiran Pengolahan EEG</strong></h4>
                            <table class="table-borderless w-full">
                                @foreach($eeg_processed->attachments as $i => $file)
                                <tr>
                                    <td>{{ ++$i }}. </td>
                                    <td>
                                        @if( in_array($file->ext, $images_ext) )
                                        <div class="col-sm-12 col-md-10 col-lg-6">
                                            <img src="{{ $file->path }}" alt="Lampiran" class="img-thumbnail" />
                                        </div>
                                        @elseif($file->ext == 'txt')
                                        <p>{{ $file->path }}</p>
                                        @else
                                        <a href="{{ $file->path }}" target="_blank" class="text-primary">
                                            {{ $file->file }}
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>