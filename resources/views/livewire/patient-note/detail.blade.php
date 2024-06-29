
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Detail Note Pasien</h3>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <a href="{{ url('/patient-note') }}" class="btn btn-secondary">Kembali</a>
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
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4"><strong>Hasil Diagnosa</strong></h4>
                            <p>
                                {{ $patient_note->diagnostic_result }}
                            </p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4"><strong>Tindak Lanjut</strong></h4>
                            <p>
                                {{ $patient_note->next_step }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>