
<section>
    <header class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                    <h3>Data EEG</h3>
                </div>
            </div>  
        </div>
    </header>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
            <section class="col-sm-12">
                @if(!$isDokter)
                <a href="{{ route('add-eeg') }}" class="btn btn-primary mb-4">Tambah Data EEG</a>
                @endif
                <table class="table table-bordered table-striped w-full">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PASIEN</th>
                            <th>SESI</th>
                            <th>DESKRIPSI</th>
                            <th>JUMLAH FILE</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($eegs)
                        @foreach($eegs as $i => $eeg)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$eeg->pasien_id}}</td>
                            <td>
                                @if(!is_null($eeg->sesi))
                                <span>{{ $eeg->sesi->value }}</span>
                                @else
                                <i class="text-danger">Sesi tidak ditemukan</i>
                                @endif
                            </td>
                            <td>{{$eeg->description}}</td>
                            <td>{{count($eeg->attachments)}}</td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="{{ url('eeg/detail/' . $eeg->id) }}">Detail</a>
                                <a class="btn btn-sm btn-primary" href="{{ url('/eeg/download/' . $eeg->id) }}">Download File</a>
                                @if(!$isDokter)
                                <a class="btn btn-sm btn-primary" href="{{ url('/eeg/edit/' . $eeg->id) }}">Edit</a>
                                <button class="btn btn-sm btn-danger" wire:click.prevent="delete({{ $eeg->id }})">Hapus</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            <p class="text-center">Tidak ada data EEG.</p>
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