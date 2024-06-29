
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Data Pasien</h3>
                </div>
            </div>  
        </div>
    </header>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
            <section class="col-sm-12" style="overflow: auto;">
                <a href="{{ route('add-patient') }}" class="btn btn-primary mb-4">Tambah Pasien</a>
                <table class="table table-bordered table-striped w-full">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PASIEN</th>
                            <th>JK</th>
                            <th>SESI</th>
                            <th>TANGGAL</th>
                            <th>JAM</th>
                            <th>UMUR</th>
                            <th>OBAT</th>
                            <th>RIWAYAT PENYAKIT</th>
                            <th>DETAK JANTUNG</th>
                            <th>WAKTU RECORD</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($patients->count() > 0)
                        @foreach($patients as $i => $patient)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$patient->pasien_id}}</td>
                            <td>{{$patient->gender == 1 ? 'Laki-Laki' : 'Perempuan'}}</td>
                            <td>{{$patient->sesi}}</td>
                            <td>{{$patient->start_date}}</td>
                            <td>{{$patient->start_time}}</td>
                            <td>{{$patient->age}}</td>
                            <td>{{$patient->drug}}</td>
                            <td>{{$patient->disease_history}}</td>
                            <td>{{$patient->heart_rate}}</td>
                            <td>{{$patient->record_time}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('/patient/edit/' . $patient->id) }}">Edit</a>
                                <button class="btn btn-sm btn-danger" wire:click.prevent="delete({{ $patient->id }})">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            <p class="text-center">Tidak ada data pasien.</p>
                        </td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </section>
            </div>
        </div>
    </section>
</section>